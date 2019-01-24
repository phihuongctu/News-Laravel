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

Route::get('route/{ten}', function($ten) {
    echo 'chao ban '.$ten;
});

Route::get('Huong','Controller@test');

Route::post('admin/dashboard','UserController@dashboard');
Route::get('admin/dashboard','UserController@dashboard');
Route::get('admin/DangNhap','UserController@getDangNhap');
Route::post('admin/DangNhap','UserConTroller@postDangNhap');
Route::get('admin/Logout','UserController@getDangXuat');
		
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'TheLoai'],function(){
		Route::get('DanhSach','TheLoaiController@getDanhSach');
		Route::get('Them','TheLoaiController@getThem');
		Route::post('Them','TheLoaiController@postThem');
		Route::get('Sua/{id}','TheLoaiController@getSua');
		Route::post('Sua/{id}','TheLoaiController@postSua');
		Route::get('Xoa/{id}','TheLoaiController@getXoa');

		
	});

	Route::group(['prefix'=>'LoaiTin'],function(){
		Route::get('DanhSach','LoaiTinController@getDanhSach');
		Route::get('Them','LoaiTinController@getThem');
		Route::post('Them','LoaiTinController@postThem');
		Route::get('Sua/{id}','LoaiTinController@getSua');
		Route::post('Sua/{id}','LoaiTinController@postSua');
		Route::get('Xoa/{id}','LoaiTinController@postXoa');

	});

	Route::group(['prefix'=>'TinTuc'],function(){
		Route::get('DanhSach','TinTucController@getDanhSach');
		Route::get('Them','TinTucController@getThem');
		Route::post('Them','TinTucController@postThem');
		Route::get('Sua/{id}','TinTucController@getSua');
		Route::post('Sua/{id}','TinTucController@postSua');
		Route::get('Xoa/{id}','TinTucController@getXoa');
	});

	Route::group(['prefix'=>'Comment'],function(){
		Route::get('Xoa/{id}/{idTinTuc}','CommentController@getXoa');
	});

	Route::group(['prefix'=>'Slide'],function(){
		Route::get('DanhSach','SlideController@getDanhSach');
		Route::get('Them','SlideController@getThem');
		Route::post('Them','SlideController@postThem');
		Route::get('Sua/{id}','SlideController@getSua');
		Route::post('Sua/{id}','SlideController@postSua');
		Route::get('Xoa/{id}','SlideController@getXoa');
	});
	Route::group(['prefix'=>'User'],function(){
		Route::get('DanhSach','UserController@getDanhSach');
		Route::get('Them','UserController@getThem');
		Route::post('Them','UserController@postThem');
		Route::get('Sua/{id}','UserController@getSua');
		Route::post('Sua/{id}','UserController@postSua');
		Route::get('Xoa/{id}','UserController@getXoa');
	});		

	Route::group(['prefix'=>'Ajax'],function(){
		Route::get('LoaiTin/{idTheLoai}','AjaxController@getLoaiTin');
	});

});


Route::get('home','PageController@home');
Route::get('lienhe','PageController@lienhe');
Route::get('loaitin/{id}/{TenKhongDau}.html','PageController@loaitin');
Route::get('tintuc/{id}/{TieuDeKhongDau}.html','PageController@tintuc');
Route::get('dangxuat','PageController@getDangXuat');
Route::get('nguoidung','PageController@getNguoiDung');
Route::post('nguoidung','PageController@postNguoiDung');
Route::get('dangki','PageController@getDangKi');
Route::post('dangki','PageController@postDangKi');

Route::post('comment/{id}','CommentController@postComment');

Route::post('timkiem','PageController@timkiem');