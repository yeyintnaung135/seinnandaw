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
    Route::get('/promotions', 'FrontController@promotions');
    Route::get('/location', 'FrontController@location');
    Route::get('/shop', 'FrontController@shop');
    Route::get('/category/{category}/{id}/{sub?}', 'FrontController@showbycategory');
    Route::get('/categorypagination/fetch_data', 'FrontController@category_fetch_data');

    Route::get('/product/detail/{id}', 'FrontController@product_detail');

    Route::get('/cart', 'FrontController@cart');
    Route::get('/checkout', 'FrontController@checkout');
    Route::get('/account', 'FrontController@account');
    Route::get('/account/orders', 'FrontController@orders');
    Route::get('/account/view-order/{id}', 'FrontController@view_order');
    Route::get('/account/downloads', 'FrontController@downloads');
    Route::get('/account/edit-address', 'FrontController@edit_address');
    Route::get('/account/edit-address/billing', 'FrontController@edit_billing');
    Route::post('/account/edit-address/billing', 'FrontController@save_billing');
    Route::get('/account/edit-address/shipping', 'FrontController@edit_shipping');
    Route::post('/account/edit-address/shipping', 'FrontController@save_shipping');
    Route::get('/account/edit-account', 'FrontController@edit_account');

    /**user Account */
    Route::get('/account/edit-account', 'users\UserController@edit')->name('user.edit');
    Route::put('/account/update/{id}', 'users\UserController@update')->name('user.update');

    /** User Login Section  */
    Route::post('/user/login', 'UserauthController@login');
    Route::get('/user/login', 'UserauthController@getlogin');
    Route::get('/user/logout', 'UserauthController@userlogout')->name('user.logout');

    Route::get('/getatccounts','FrontprivateController@getatccounts' );
    Route::post('/user/register', 'UserauthController@register');
    Route::post('/storeproducttocart', 'FrontprivateController@storeproducttocart');
    Route::post('/changecount', 'FrontprivateController@changecount');
    Route::post('/removecartitem', 'FrontprivateController@removecartitem');
    Route::post('/checkoutform', 'FrontController@checkoutform');
    Route::get('/checkoutform', 'FrontController@getcheckout');

    Route::get('/checkout/order-received', 'FrontController@orderReceived');
    Route::post('/connectwithbank', 'PaymentController@startgotobank');
    //shop page sort
    // Route::post('/get_product_sortall_ajax', 'FrontController@get_product_sortall')->name('get_product_sortall_ajax');
    Route::get('/shoppagination/fetch_data', 'FrontController@fetch_data');
    Route::get('/shoppagination/fetch_promotion_data', 'FrontController@fetch_promotion_data');

    require "backend.php";

});
Route::post('/checkoutmpukbzsuccess', 'PaymentController@checkoutmpukbzsuccess');
Route::get('/checkoutmpukbzsuccess/{data?}', 'PaymentController@getsuccess');
Route::post('/checkoutmpukbzsuccessbk', 'PaymentController@checkoutmpukbzsuccessbk');
Route::post('/done.php', 'PaymentController@checkoutmvsuccess');
