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
})->name('home');


Route::group(['prefix'=>'account','namespace'=>'User'],function(){
	// Đăng kí
	Route::get('/register','RegisterController@index');
	// Xử lí đăng kí
	Route::post('/register','RegisterController@register');

	// Đăng nhập
	Route::get('/login','LoginController@index');

	// Xử lí đăng nhập
	Route::post('/login','LoginController@login');

	// Xử lí đăng xuất
	Route::get('/logout','LoginController@logout');

	// Thông tin khách hàng
	Route::get('/profile','ProfileController@index');

	// Thay đổi thông tin khách hàng
	Route::post('/profile','ProfileController@change_profile');

	// Thay đổi mật khẩu
	Route::get('/password/change',function(){
		return view('user.thongtin.change_password');
	});

	Route::post('/password/change','ProfileController@change_password');
});

// Route::get('/demo',function(){
// 	return view('demo');
// });