<?php namespace App\Payment\Controllers;

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use App\Payment\Services\PaymentPaypal;
use App\Sales\Models\Pedido;
use App\Handlers\Interfaces\PedidoEntityInterface;
use DB;


class PaymentController
{
	public $invoiceNumber;

	public function paypal(
		PedidoEntityInterface $pedidoEntityInterface
	) {
		
		$userId = 1;
		if(\Cart::session($userId)->getTotalQuantity() == 0)
		return redirect('/cart');

		$resultPedido = $pedidoEntityInterface->create(request()->all());
		//print_r($resultPedido); dd();
		$objPaypal = new PaymentPaypal;
		$objPaypal->init();
		//print_r(request()->all());

		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		// Set some example data for the payment.
		$currency = 'USD';
		$amountPayable = request("amount");
		$invoiceNumber = uniqid();

		$amount = new Amount();
		$amount->setCurrency($currency)
		    ->setTotal($amountPayable);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
		    ->setDescription('Some description about the payment being made')
		    ->setInvoiceNumber($invoiceNumber);

		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl(\Config::get("paypal.return_url"))
		    ->setCancelUrl(\Config::get("paypal.cancel_url"));

		$payment = new Payment();
		$payment->setIntent('sale')
		    ->setPayer($payer)
		    ->setTransactions([$transaction])
		    ->setRedirectUrls($redirectUrls);

		try {
		    $payment->create($objPaypal->getApi());
		} catch (Exception $e) {
		    throw new Exception('Unable to create link for payment');
		}

		$pedido = Pedido::findorfail($resultPedido['id']);
		$pedido->codigo = $invoiceNumber;
		$pedido->save();

		$userId = 1;
		//\Cart::session($userId)->clear();

		session()->put('userId', $userId);
		session()->put('invoiceNumber', $invoiceNumber);
		session()->put('total', $amountPayable);
		session()->put('currency', $currency);
		session()->save();
		$codigo = request()->session()->get('invoiceNumber');
		//dd($codigo);


		header('location:' . $payment->getApprovalLink());
		exit(1);
	}

	public function pagoEfectivo()
	{

	}

	public function cancelPaypal()
	{
		return view("cart.cart_detail");
	}

	public function successBuy()
	{
		$userId = session()->get('userId');
		$invoiceNumber = session()->get('invoiceNumber');
		$total = session()->get('total');
		$currency = session()->get('currency');

        \Cart::session($userId)->getContent()->each(function($item) use (&$items)
        {
            $items[] = $item;
        });

 		\Cart::clear();
		\Cart::session($userId)->clear();
		
		
		return view("cart.cart_success", [
			'invoiceNumber' => $invoiceNumber,
			'items' => $items,
			'total' => $total,
			'currency' => $currency,
			]);
	}
}