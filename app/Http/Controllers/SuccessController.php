<?php
/**
 * Created by PhpStorm.
 * User: darryl
 * Date: 4/30/2017
 * Time: 10:58 AM
 */

namespace App\Http\Controllers;

use Darryldecode\Cart\CartCondition;
use App\Master\Models\Producto;

class SuccessController extends Controller
{
    public function index()
    {
        $userId = 1; // get this from session or wherever it came from

        if(request()->ajax())
        {
            $items = [];
            $sedeId = 30;
            $productos = [];

            \Cart::session($userId)->getContent()->each(function($item) use (&$items)
            {
                $items[] = $item;
            });

            foreach ($items as $item) {
                \Cart::session($userId)->remove($item['id']);
            }

            return response(array(
                'success' => true,
                'data' => $items,
                'productos' => $productos,
                'message' => 'cart get items success Paypal index'
            ),200,[]);
        } else {
            return view('success.index');
        }
    }


}