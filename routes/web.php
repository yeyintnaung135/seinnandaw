<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

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

Auth::routes();

Route::group(['middleware' => ['web']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/', 'FrontController@index');
    Route::get('/shop', 'FrontController@shop');
    Route::get('/category/{category}/{id}/{sub?}', 'FrontController@showbycategory');

    Route::get('/product/detail/{id}', 'FrontController@product_detail');

    Route::get('/cart', 'FrontController@cart');
    Route::get('/checkout', 'FrontController@checkout');
    Route::get('/account', 'FrontController@account');
    Route::get('/account/orders', 'FrontController@orders');
    Route::get('/account/view-order', 'FrontController@view_order');
    Route::get('/account/downloads', 'FrontController@downloads');
    Route::get('/account/edit-address', 'FrontController@edit_address');
    Route::get('/account/edit-address/billing', 'FrontController@edit_billing');
    Route::get('/account/edit-address/shipping', 'FrontController@edit_shipping');
    Route::get('/account/edit-account', 'FrontController@edit_account');
    Route::post('/user/login', 'UserauthController@login');
    Route::get('/user/login', 'UserauthController@getlogin');
    Route::get('/getatccounts','FrontprivateController@getatccounts' );
    Route::post('/user/register', 'UserauthController@register');
    Route::post('/storeproducttocart', 'FrontprivateController@storeproducttocart');
    Route::post('/changecount', 'FrontprivateController@changecount');
    Route::post('/removecartitem', 'FrontprivateController@removecartitem');
    Route::post('/checkoutform', 'FrontController@checkoutform');
    Route::get('/checkoutform', 'FrontController@getcheckout');

    Route::get('/checkout/order-received', 'FrontController@orderReceived');
    Route::post('/connectwithbank', 'FrontprivateController@startgotobank');

    require "backend.php";

});
Route::post('/checkoutmpukbzsuccess', 'PaymentController@checkoutmpukbzsuccess');
Route::post('/checkoutmpukbzsuccessbk', 'PaymentController@checkoutmpukbzsuccessbk');
Route::post('/done.php', 'PaymentController@checkoutmvsuccess');
