<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.user.home');
});

Route::get('/product', 'App\Http\Controllers\ProductController@index')->name('guest.product.index');
Route::get('/product-detail', 'App\Http\Controllers\ProductController@product_detail')->name('guest.product.product-detail');
Route::get('/login', 'App\Http\Controllers\ProductController@login')->name('guest.product.login');

Route::get('/dashboard', 'App\Http\Controllers\Admin\DashboardController@index');    

Route::resource('/dashboard/category', App\Http\Controllers\Admin\CategoryController::class);
Route::resource('/dashboard/product', App\Http\Controllers\Admin\ProductController::class);