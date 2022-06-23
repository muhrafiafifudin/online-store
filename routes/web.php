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

Route::get('/', 'DashboardController@index');
Route::get('/product', 'ProductController@index')->name('product.index');
Route::get('/product/{slug}', 'ProductDetailController@index');

Route::post('add-to-cart', 'CartController@addProduct');
Route::post('update-cart', 'CartController@updateProduct');
Route::post('delete-cart-item', 'CartController@deleteProduct');

// User Routes
Route::middleware(['auth'])->group(function () {
    // Account Setting
    Route::get('account/dashboard', 'AccountController@dashboard');
    Route::get('account/transaction', 'AccountController@transaction');
    Route::get('account/transaction/transaction-{id}', 'AccountController@transactionDetail');
    Route::get('account/transaction/{id}', 'AccountController@paymentDetail');
    // Update Data to Database Transaction from Midtrans
    Route::post('account/transaction/{id}', 'AccountController@paymentPost');

    Route::get('account/address', 'AccountController@address');

    Route::get('cart', 'CartController@index');
    Route::get('checkout', 'CheckoutController@index');
    // Add Data to Database Transaction
    Route::post('place-order', 'CheckoutController@placeorder');

    // Get region with IndoRegion
    Route::post('get-city', 'CheckoutController@getCity');
    Route::post('get-district', 'CheckoutController@getDistrict');
    Route::post('get-village', 'CheckoutController@getVillage');
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


// Test HTML
Route::get('tes', function() {
    return view('pages.account-transaction-detail');
});
