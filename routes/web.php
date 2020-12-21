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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('verified');

// profile controller
Route::get('/profile', 'ProfileController@index')->name('profiles.index')->middleware('verified');

// Account Disable route
Route::get('accounts/{id}/disable', 'AccountController@disable')->name('accounts.disable')->middleware('verified');

Route::middleware(['auth', 'verified'])->group(function() {
    Route::resources([
        'accounts' => 'AccountController',
        'transactions' => 'TransactionController',
        'topups' => 'AccountTopUpController'
    ]);

});