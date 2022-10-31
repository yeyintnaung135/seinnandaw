<?php
Route::get('/backend/home', function(){
return view('backend.home');
})->middleware('auth');
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
})
?>

