<?php

Route::get('/backend/home', function(){
return view('backend.home');
})->middleware('auth:admins');
Route::get('/table', function(){
    return view('backend.table');
});
Route::group(['prefix' => '/backend/customers'], function () {
  Route::get('/list', 'CustomerController@list');
  Route::get('/get_all_customers', 'CustomerController@getAllCustomers');
});
Route::group(['prefix' => '/backend/categories'],function (){
    Route::get('/list', 'CategoriesController@list');
    Route::get('/add', 'CategoriesController@add');
    Route::get('/edit/{id}', 'CategoriesController@edit');
    Route::post('/add', 'CategoriesController@save');
    Route::post('/edit', 'CategoriesController@update');
    Route::get('/detail/{id}', 'CategoriesController@detail');
    Route::get('/get_all_categories', 'CategoriesController@getAllCategories');

    /** Category Delete Section */
    Route::post('/delete', 'CategoriesController@delete');
    Route::get('/trash','CategoriesController@trash')->name('category.trash');
    Route::get('/categories/trash','CategoriesController@getAllTrashCategories')->name('category.trash.datatable');
    Route::post('/category/multiple_trash','CategoriesController@multiple_trashed')->name('category.multiple.trash');
    Route::get('/category/restore/{id}','CategoriesController@restore')->name('category.restore');
    Route::post('/category/multiple_restore','CategoriesController@multiple_restore')->name('categories.multiple.restore');
    Route::post('/category/multiple_delete','CategoriesController@multiple_forcedelete')->name('categories.multiple.forcedelete');
});
Route::group(['prefix' => '/backend/banners'],function (){
    Route::get('/list', 'BannersController@list');
    Route::get('/add', 'BannersController@add');
    Route::get('/edit/{id}', 'BannersController@edit');
    Route::post('/add', 'BannersController@save');
    Route::post('/edit/{id}', 'BannersController@update');
    Route::post('/delete', 'BannersController@delete');
    Route::get('/detail/{id}', 'BannersController@detail');
    Route::get('/get_all_banners', 'BannersController@getAllBanners');
});
Route::group(['prefix' => '/backend/products'],function (){
    Route::get('/list', 'ProductsController@list');
    Route::get('/get_all_products', 'ProductsController@getAllProducts'); //swe swe 's datatable product route
    Route::get('/add', 'ProductsController@add');
    Route::get('/edit/{id}', 'ProductsController@edit');
    Route::post('/add', 'ProductsController@save');
    Route::post('/edit/{id}', 'ProductsController@update');
    Route::get('/detail/{id}', 'ProductsController@detail');

    Route::get('/discount/{id}', 'ProductsController@discount');
    Route::post('/discount', 'ProductsController@setdiscount');
    
    /** Product Delete Routes */
    Route::post('/delete', 'ProductsController@delete');
    Route::get('/trash', 'ProductsController@trash')->name('product.trash');
    Route::get('/product/trashed', 'ProductsController@trash_lists_datatable')->name('trash.lists.datatable');
    Route::get('/restore/{id}', 'ProductsController@restore')->name('product.restore');
    Route::post('/multiple/restore', 'ProductsController@multiple_restore')->name('product.multiple.restore');
    Route::post('/forcedelete', 'ProductsController@forcedelete')->name('product.forcedelete');
    Route::post('/multiple_trashed', 'ProductsController@multiple_trashed')->name('product.multiple.trash');
    Route::post('/multiple_forcedelete', 'ProductsController@multiple_forcedelete')->name('product.multiple.forcedelete');



});

Route::group(['prefix' => '/backend/locations'],function (){
  Route::get('/list', 'LocationsController@list');
  Route::get('/add', 'LocationsController@add');
  Route::post('/add', 'LocationsController@save');

  Route::get('/edit/{id}', 'LocationsController@edit');
  Route::post('/edit', 'LocationsController@update');

  Route::post('/delete', 'LocationsController@delete');
  Route::get('/detail/{id}', 'LocationsController@detail');
});

Route::group(['prefix' => '/backend/payments'],function (){
    Route::get('/list', 'BackendPaymentController@list');
    Route::get('/get_payment_lists', 'BackendPaymentController@getPayments')->name('get_payment_lists');
    Route::get('/detail', 'BackendPaymentController@detail')->name('payment_detail');
    Route::post('/delete', 'BackendPaymentController@delete')->name('payment_delete');
});
Route::get('/adminlogin', 'Auth\LoginController@showAdminLoginForm')->name('adminlogin');
Route::post('/adminLogin', 'Auth\LoginController@adminLogin');
Route::get('/adminregister', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/adminregister', 'Auth\RegisterController@adminregister');
Route::post('/adminlogout', 'Auth\LoginController@adminlogout');
Route::get('/adminforgot', 'Auth\AdminsForgotPasswordController@showLinkRequestForm')
    ->name('admin.password.request');
Route::post('/adminsendemail', 'Auth\AdminsForgotPasswordController@sendResetLinkEmail')
    ->name('admin.password.email');

?>

