<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('login', function () {
    return redirect('/login');
});
// routes/web.php
Route::get('', [LoginController::class, 'index']);
// Route::get('/', [DashboardController::class, 'index']);
// Route::get('/', 'App\Http\Controllers\DashboardController@index');
Route::get('dashboard', 'App\Http\Controllers\DashboardController@index');
Route::get('mobil', 'App\Http\Controllers\MobilController@index');
Route::post('mobil/store', 'App\Http\Controllers\MobilController@store');
Route::post('mobil/{id_mobil}', 'App\Http\Controllers\MobilController@update');
Route::get('mobil/hapus/{id_mobil}', 'App\Http\Controllers\MobilController@hapus');
Route::get('reservasi', 'App\Http\Controllers\ReservasiController@index');
Route::post('reservasi/store', 'App\Http\Controllers\ReservasiController@store');
Route::get('transaction', 'App\Http\Controllers\TransactionController@index');
Route::post('transaction/store', 'App\Http\Controllers\TransactionController@store');
Route::get('user', 'App\Http\Controllers\UserController@index');
Route::post('user/store', 'App\Http\Controllers\UserController@store');
Route::get('invoice/{id_reservasi}', 'App\Http\Controllers\InvoiceController@show')->name('invoice.show');
Route::get('rekap', [InvoiceController::class, 'rekap'])->name('invoice.rekap');
Route::post('mobil/update-status/{id}', [MobilController::class, 'updateStatus'])->name('mobil.updateStatus');
Route::get('login', 'App\Http\Controllers\LoginController@index');
Route::post('login', 'App\Http\Controllers\LoginController@login');