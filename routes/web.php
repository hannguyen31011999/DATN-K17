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

Route::get('/admin/dashboard', function () {
    return view('admin.trangchu.dashboard');
})->name('dashboard');


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
Route::prefix('list-user')->group (function(){
    Route::name('list-admin.ds-user.')->group (function(){
		Route::get('/', 'admin\usercontroller@index')->name('list');
		Route::get('update/{id}', 'admin\usercontroller@edit')->name('update');
		Route::get('delete/{id}', 'admin\usercontroller@destroy')->name('delete');
    });  
});
Route::prefix('list-news')->group (function(){
    Route::name('list-admin.ds-news.')->group (function(){
        Route::get('/', 'admin\newscontroller@index')->name('list');
        Route::get('add', 'admin\newscontroller@create')->name('add');
        Route::post('add', 'admin\newscontroller@store')->name('edit-add');
        Route::get('update/{id}', 'admin\newscontroller@edit')->name('update');
        Route::post('update/{id}', 'admin\newscontroller@update')->name('edit-update');
        Route::get('delete/{id}', 'admin\newscontroller@destroy')->name('delete');
    });  
});
Route::prefix('list-comment')->group (function(){
    Route::name('list-admin.ds-comment.')->group (function(){
		Route::get('/', 'admin\commentcontroller@index')->name('list');
        Route::get('update/{id}', 'admin\commentcontroller@edit')->name('update');
    });  
});
Route::prefix('list-member')->group (function(){
    Route::name('list-admin.ds-member.')->group (function(){
		Route::get('/', 'admin\membercontroller@index')->name('list');
        Route::post('update/{id}', 'admin\membercontroller@update')->name('update');
    });  
});
Route::prefix('list-order')->group (function(){
    Route::name('list-admin.ds-order.')->group (function(){
		Route::get('/', 'admin\ordercontroller@index')->name('list');
        Route::post('update/{id}', 'admin\ordercontroller@update')->name('update');
    });  
});

