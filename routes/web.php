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
    return view('welcome');
});

Route::get('/cek', function () {
    return view('pages.admin.shop.form-item');
});

Route::get('/dashboard', 'App\Http\Controllers\Admin\DashboardController@index');

Route::resource('/dashboard/category', App\Http\Controllers\Admin\CategoryController::class);
Route::resource('/dashboard/item', App\Http\Controllers\Admin\ItemController::class);