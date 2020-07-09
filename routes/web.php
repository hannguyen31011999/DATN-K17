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

Route::get('/', function () {
    return view('user.trangchu.index');
});
Route::get('/ds-user', function () {
    return view('admin.list-admin.ds-user.user');
});
Route::get('/ds', function () {
    return view('admin.list-admin.ds-product.product');
});
Route::prefix('list-product')->group (function(){
    Route::name('list-admin.ds-product.')->group (function(){
        Route::get('/', 'productcontroller@index')->name('list');
        Route::get('add', 'productcontroller@create')->name('add');
        Route::post('add', 'productcontroller@store')->name('edit-add');
        Route::get('update/{id}', 'productcontroller@edit')->name('update');
        Route::post('update/{id}', 'productcontroller@update')->name('edit-update');
        Route::get('delete/{id}', 'productcontroller@destroy')->name('delete');
    });  
});
Route::prefix('list-typeproduct')->group (function(){
    Route::name('list-admin.ds-typeproduct.')->group (function(){
        Route::get('/', 'typeproductcontroller@index')->name('list');
        Route::get('add', 'typeproductcontroller@create')->name('add');
        Route::post('add', 'typeproductcontroller@store')->name('edit-add');
        Route::get('update/{id}', 'typeproductcontroller@edit')->name('update');
        Route::post('update/{id}', 'typeproductcontroller@update')->name('edit-update');
        Route::get('delete/{id}', 'typeproductcontroller@destroy')->name('delete');
    });  
});




