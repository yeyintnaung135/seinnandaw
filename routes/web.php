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
    Route::get('/category/{category}/{id}', 'FrontController@showbycategory');

    Route::get('/product/detail/{id}', 'FrontController@product_detail');

    Route::get('/cart', 'FrontController@cart');
    Route::get('/checkout', 'FrontController@checkout');
    Route::get('/account', 'FrontController@account');
    Route::post('/user/login', 'UserauthController@login');
    Route::post('/user/register', 'UserauthController@register');

    require "backend.php";

});
