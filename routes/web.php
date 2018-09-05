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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[
	'as'   => 'trang-chu',
	'uses' => 'PageController@getIndex'
]);
Route::get('product-type/{type}',[
	'as'   => 'loaisanpham',
	'uses' => 'PageController@getProductType'
]);
Route::get('product-detail/{id}',[
	'as'   => 'chitietsanpham',
	'uses' => 'PageController@getProductDetail'
]);
Route::get('checkout',[
	'as'   => 'dathang',
	'uses' => 'PageController@getCheckOut'
]);
Route::post('checkout',[
	'as'   => 'dathang',
	'uses' => 'PageController@postCheckout'
]);
Route::get('contact',[
	'as'   => 'lienhe',
	'uses' => 'PageController@getContact'
]);
Route::get('about',[
	'as'   => 'gioithieu',
	'uses' => 'PageController@getAbout'
]);
Route::get('add-to-cart/{id}',[
'as' => 'themgiohang',
'uses' => 'PageController@getCart'
]);
Route::get('delete-to-cart/{id}',[
'as' => 'xoagiohang',
'uses' => 'PageController@getDelItemCart'
]);
Route::get('login',[
	'as' => 'dangnhap',
	'uses' => 'PageController@getLogin'
]);
Route::post('login',[
	'as' => 'dangnhap',
	'uses' => 'PageController@postLogin'
]);
Route::get('signup',[
	'as' => 'dangki',
	'uses' => 'PageController@getSignup'
]);
Route::post('signup',[
	'as' => 'dangki',
	'uses' => 'PageController@postSignup'
]);

// Route::post('login','LoginController@postLogin');
// Route::get('/register','LoginController@register');
// Route::post('register','LoginController@postRegister');
