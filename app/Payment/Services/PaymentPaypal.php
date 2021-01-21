<?php namespace App\Payment\Services;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

class PaymentPaypal
{
    protected $_apiContext;

    public function init()
    {
        $this->_apiContext = $this->getApiContext(\Config::get("paypal.client_id"), \Config::get("paypal.client_secret"), \Config::get("paypal.enable_sandbox"));
    }
    public function getApiContext($clientId, $clientSecret, $enableSandbox = false)
    {
        $apiContext = new ApiContext(
            new OAuthTokenCredential($clientId, $clientSecret)
        );

        $apiContext->setConfig([
            'mode' => $enableSandbox ? 'sandbox' : 'live'
        ]);

        return $apiContext;
    }

    public function getApi()
    {
        return $this->_apiContext;
    }
   
}