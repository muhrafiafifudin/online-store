<?php

use Illuminate\Routing\RouteGroup;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('pages.home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/product', 'ProductController@index')->name('product.index');
Route::get('/product-detail', 'ProductDetailController@index')->name('product-detail.index');
Route::get('/cart', 'ProductDetailController@cart')->name('product-detail.cart');

// User Routes
Route::middleware(['auth'])->group(function () {
    
});

// Admin Routes
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        // Login Route
        Route::get('login', 'AuthenticatedSessionController@create')->name('login');
        Route::post('login', 'AuthenticatedSessionController@store')->name('adminlogin');
    });
    Route::middleware('admin')->group(function () {
        // Dashboard
        Route::get('dashboard','DashboardController@index')->name('dashboard');
        // Category
        Route::resource('category','CategoryController');
        //Product
        Route::resource('product','ProductController');
    });
    Route::post('logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');
});