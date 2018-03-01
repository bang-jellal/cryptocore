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

Auth::routes();
// Home
Route::get('/', 'HomeController@index')->name('home');
// Product
Route::get('product', 'ProductController@index')->name('product');
Route::get('product/{product}', 'ProductController@show')->name('product.show');
Route::get('category', 'CategoryController@index')->name('category');
Route::get('brand', 'BrandController@index')->name('brand');

Route::group(['middleware' => 'auth'], function() {
    include __DIR__ . '/web/admin.php'; // Role Admin
});
