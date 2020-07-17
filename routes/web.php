<?php
use App\Http\Middleware\CheckLogin;
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

Route::get('/','User\HomeController@index')->name('home');

Route::post('/','User\CartController@addCart');

Route::delete('/','User\CartController@delete');

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
	Route::get('/profile','ProfileController@index')->middleware(CheckLogin::class);

	// Cập nhật thông tin khách hàng
	Route::post('/profile','ProfileController@change_profile')->middleware(CheckLogin::class);

	// Thay đổi mật khẩu
	Route::get('/password/change',function(){
		return view('user.thongtin.change_password');
	})->middleware(CheckLogin::class);

	// Xử lí thay đổi mật khẩu
	Route::post('/password/change','ProfileController@change_password')->middleware(CheckLogin::class);

	// Địa chỉ
	Route::get('/address','ProfileController@view_address')->middleware(CheckLogin::class);

	// Thêm địa chỉ
	Route::get('/address/create','ProfileController@CreateAddress')->middleware(CheckLogin::class);

	// Cập nhật địa chỉ và sdt
	Route::post('/address/edit','ProfileController@UpdateAddress')->middleware(CheckLogin::class);

	// Lấy lại mật khẩu
	Route::get('/recovery',function(){
		return view('user.dangnhap.reset_password');
	});

	// Xử lí lấy lại mật khẩu
	Route::post('/recovery','LoginController@sendMail_resetPassword');

	// Mật khẩu mới
	Route::get('/password/reset',function(){
		return view('user.dangnhap.new_password');
	});

	// Xử lí mật khẩu mới
	Route::post('/password/reset','LoginController@newPassword');
});


