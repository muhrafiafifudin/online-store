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

require __DIR__.'/auth.php';

// Route Login Google Acoount use Socialite
Route::get('sign-in-google', 'Auth\AuthenticatedSessionController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\AuthenticatedSessionController@handleProviderCallback')->name('google.callback');

Route::get('/', 'DashboardController@index');
Route::get('product', 'ProductController@index');
Route::get('product/{slug}', 'ProductDetailController@index');
Route::get('about-us', 'AboutUsController@index');
Route::get('contact-us', 'ContactUsController@index');

Route::post('add-to-cart', 'CartController@addProduct');
Route::post('update-cart', 'CartController@updateProduct');
Route::post('delete-cart-item', 'CartController@deleteProduct');

// User Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@index');
    // Account Setting
    Route::get('account/dashboard', 'AccountController@dashboard');
    Route::get('account/transaction', 'AccountController@transaction');
    Route::get('account/transaction/transaction-{id}', 'AccountController@transactionDetail');
    Route::get('account/transaction/{id}', 'AccountController@paymentDetail');
    // Update Data to Database Transaction from Midtrans
    Route::post('account/transaction/{id}', 'AccountController@paymentPost');
    Route::get('account/transaction-success', 'AccountController@transactionSuccess');

    Route::get('account/user-account', 'AccountController@address')->name('account.user');
    Route::put('account/user-account/{id}', 'AccountController@addressUpdate');

    Route::get('cart', 'CartController@index');
    Route::get('checkout', 'CheckoutController@index');
    // Add Data to Database Transaction
    Route::post('place-order', 'CheckoutController@placeorder');

    // Get region and shipping cost Rajaongkir
    Route::post('get-province', 'CheckoutController@getProvince');
    Route::post('get-city/{id}', 'CheckoutController@getCity');
    Route::post('get-courier', 'CheckoutController@getCourier');
    Route::post('get-package', 'CheckoutController@getPackage');
    Route::post('get-estimate', 'CheckoutController@getEstimate');

    // Transaction Status
    Route::put('transaction/update-finish/{id}', 'AccountController@updateFinish');
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
        // Customer
        Route::resource('customer','CustomerController');
        // Category
        Route::resource('category','CategoryController');
        // Product
        Route::resource('product','ProductController');
        // Store Profile
        Route::resource('store','StoreController');
        // Transaction
        Route::get('transaction', 'TransactionController@index')->name('transaction.index');
        Route::get('transaction-detail/{id}', 'TransactionController@transactionDetail');

        Route::put('transaction/update-process/{id}', 'TransactionController@updateProcess');
        Route::put('transaction/update-delivery/{id}', 'TransactionController@updateDelivery');

        // Report Transaction
        Route::get('report-transaction', 'TransactionController@reportTransaction');
        Route::get('print-pdf/{fromDate}/{toDate}/{type}', 'TransactionController@printPdf');
    });

    Route::post('logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');
});


