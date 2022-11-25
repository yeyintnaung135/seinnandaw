<?php
Route::get('/backend/home', function(){
return view('backend.home');
})->middleware('auth:admins');
Route::get('/table', function(){
    return view('backend.table');
});
Route::group(['prefix' => '/backend/categories'],function (){
    Route::get('/list', 'CategoriesController@list');
    Route::get('/add', 'CategoriesController@add');
    Route::get('/edit/{id}', 'CategoriesController@edit');
    Route::post('/add', 'CategoriesController@save');
    Route::post('/edit', 'CategoriesController@update');
    Route::post('/delete', 'CategoriesController@delete');
    Route::get('/detail/{id}', 'CategoriesController@detail');
});
Route::group(['prefix' => '/backend/banners'],function (){
    Route::get('/list', 'BannersController@list');
    Route::get('/add', 'BannersController@add');
    Route::get('/edit/{id}', 'BannersController@edit');
    Route::post('/add', 'BannersController@save');
    Route::post('/edit/{id}', 'BannersController@update');
    Route::post('/delete', 'BannersController@delete');
    Route::get('/detail/{id}', 'BannersController@detail');
});
Route::group(['prefix' => '/backend/products'],function (){
    Route::get('/list', 'ProductsController@list');
    Route::get('/products', 'ProductsController@items_list_datatable')->name('product.lists.datatable');
    Route::get('/add', 'ProductsController@add');
    Route::get('/edit/{id}', 'ProductsController@edit');
    Route::post('/add', 'ProductsController@save');
    Route::post('/edit/{id}', 'ProductsController@update');
    Route::post('/delete', 'ProductsController@delete');
    Route::get('/detail/{id}', 'ProductsController@detail');
    Route::get('/trash', 'ProductsController@trash')->name('product.trash');
    Route::get('/product/trashed', 'ProductsController@trash_lists_datatable')->name('trash.lists.datatable');
    Route::get('/restore/{id}', 'ProductsController@restore')->name('product.restore');
    Route::post('/forcedelete', 'ProductsController@forcedelete')->name('product.forcedelete');
    Route::post('/multiple_trashed', 'ProductsController@multiple_trashed')->name('product.multiple.trash');
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

