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
/*
Route::group(['middleware' => ['auth'], 'namespace' => 'Admin'], function(){
	Route::get('admin', 'Admin\AdminController@index')->name('admin.home');

});
*/
Route::get('admin', 'Admin\AdminController@index')->name('admin.home');

Route::get('balance', 'Admin\BalanceController@index')->name('admin.balance');
Route::get('deposit', 'Admin\BalanceController@deposit')->name('balance.deposit');
Route::post('deposit', 'Admin\BalanceController@depositStore')->name('deposit.store');
Route::get('withdrawn', 'Admin\BalanceController@withdrawn')->name('balance.withdrawn');
Route::post('withdrawn', 'Admin\BalanceController@withdrawnStore')->name('withdrawn.store');
Route::get('transfer', 'Admin\BalanceController@transfer')->name('balance.transfer');
Route::post('confirm-transfer', 'Admin\BalanceController@confirmTransfer')->name('confirm.transfer');
Route::post('transfer', 'Admin\BalanceController@transferStore')->name('transfer.store');






Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {	
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');
});