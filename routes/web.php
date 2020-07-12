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
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
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

Route::get('/admin/home', function () {
    return view('admin.trangchu.dashboard');
})->name('admin/home');


Route::prefix('list-product')->group (function(){
    Route::name('list-admin.ds-product.')->group (function(){
        Route::get('/', 'admin\productcontroller@index')->name('list');
        Route::get('add', 'admin\productcontroller@create')->name('add');
        Route::post('add', 'admin\productcontroller@store')->name('edit-add');
        Route::get('update/{id}', 'admin\productcontroller@edit')->name('update');
        Route::post('update/{id}', 'admin\productcontroller@update')->name('edit-update');
        Route::get('delete/{id}', 'admin\productcontroller@destroy')->name('delete');
    });  
});
Route::prefix('list-typeproduct')->group (function(){
    Route::name('list-admin.ds-typeproduct.')->group (function(){
        Route::get('/', 'admin\typeproductcontroller@index')->name('list');
        Route::get('add', 'admin\typeproductcontroller@create')->name('add');
        Route::post('add', 'admin\typeproductcontroller@store')->name('edit-add');
        Route::get('update/{id}', 'admin\typeproductcontroller@edit')->name('update');
        Route::post('update/{id}', 'admin\typeproductcontroller@update')->name('edit-update');
        Route::get('delete/{id}', 'admin\typeproductcontroller@destroy')->name('delete');
    });  
});


