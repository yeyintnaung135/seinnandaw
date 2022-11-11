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
Route::group(['prefix' => '/backend/products'],function (){
    Route::get('/list', 'ProductsController@list');
    Route::get('/add', 'ProductsController@add');
    Route::get('/edit/{id}', 'ProductsController@edit');
    Route::post('/add', 'ProductsController@save');
    Route::post('/edit/{id}', 'ProductsController@update');
    Route::post('/delete', 'ProductsController@delete');
    Route::get('/detail/{id}', 'ProductsController@detail');
});
Route::get('/adminlogin', 'Auth\LoginController@showAdminLoginForm')->name('adminlogin');
Route::post('/adminLogin', 'Auth\LoginController@adminLogin');
Route::get('/adminregister', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/adminregister', 'Auth\RegisterController@adminregister');

?>

