<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/','CartController@index')->name('cart.index');
Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@add')->name('cart.add');
Route::post('/cart/conditions','CartController@addCondition')->name('cart.addCondition');
Route::delete('/cart/conditions','CartController@clearCartConditions')->name('cart.clearCartConditions');
Route::get('/cart/details','CartController@details')->name('cart.details');
Route::delete('/cart/{id}','CartController@delete')->name('cart.delete');

Route::post("/payment-paypal", "\App\Payment\Controllers\PaymentController@paypal");
Route::get("/payment-paypal/cancel", "\App\Payment\Controllers\PaymentController@cancelPaypal");
Route::get("/payment-paypal/success", "\App\Payment\Controllers\PaymentController@successBuy");
Route::get('/success','SuccessController@index')->name('success.index');

Route::post("/payment-pagoefectivo", "\App\Payment\Controllers\PaymentController@pagoEfectivo");

Route::group(['prefix' => 'wishlist'],function()
{
    Route::get('/','WishListController@index')->name('wishlist.index');
    Route::post('/','WishListController@add')->name('wishlist.add');
    Route::get('/details','WishListController@details')->name('wishlist.details');
    Route::delete('/{id}','WishListController@delete')->name('wishlist.delete');
});
