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

use Illuminate\Support\Facades\Route;

Auth::routes();
//url: /admin se den url: admin/user
Route::get("admin", function () {
    //di chuyen den mot url
    return redirect(url('login'));
});
//url: logout
Route::get("logout", function () {
    Auth::logout();
    //di chuyen den mot url
    return redirect(url('login'));
});
//home
Route::get('/home', function () {
    //di chuyen den mot url
    return redirect(url('admin/home'));
});
Route::group(["prefix" => "admin", "middleware" => ['auth', 'auth.admin']], function () {
    Route::get("home", function () {
        return view("admin.index");
    });
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'adminProductcontroller');
    Route::resource('slide', 'SlideController');
    Route::resource('customer', 'customerController');
    Route::get('bill', 'billController@getbill');
    Route::get('bill-detail/{id}', 'billController@billdetail');

});
// frontend
Route::get('/', 'pageController@getindex');
// loai sản phẩm
Route::get('loai-san-pham/{type}', 'pageController@getloaisp');
// chi tiết sản phẩm
Route::get('chi-tiet-san-pham/{id}', 'pageController@getchitiet');
// tìm kiếm sáng phẩm
Route::get('search', 'pageController@search');
// gio hàng
Route::get('showcart', 'cartController@index');
Route::post('addcart', 'cartController@cart');
Route::get('cart/destroy', 'cartController@destroy');
Route::post('up', 'cartController@up');
Route::post('down', 'cartController@down');
Route::post('remove', 'cartController@remove');
Route::get('getcheckout', 'CartController@getCheckOut');
Route::post('postcheckout', 'checkoutController@postCheckOut');
Route::get('checkout-success', 'checkoutController@checkoutSuccess');
