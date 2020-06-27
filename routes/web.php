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
Route::get('/admin', function () {
    return view('mater-admin');
});
Route::get('/ds-product', function () {
    return view('admin.ds-product.product');
});
