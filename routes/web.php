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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'FrontController@index');
Route::get('/shop', 'FrontController@shop');
Route::get('/product-category/{category}', 'FrontController@showbycategory');

Route::get('/product/{id}', 'FrontController@product_detail');

Route::get('/cart', 'FrontController@cart');
Route::get('/checkout', 'FrontController@checkout');