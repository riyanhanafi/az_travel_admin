<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('mobil', 'App\Http\Controllers\apiController@index');
Route::post('mobil/store', 'App\Http\Controllers\apiController@store');
Route::get('reservasi', 'App\Http\Controllers\apiController@indexreservasi');
Route::post('reservasi/store', 'App\Http\Controllers\apiController@storereservasi');
Route::get('transaction', 'App\Http\Controllers\apiController@indextransaction');
Route::post('transaction/store', 'App\Http\Controllers\apiController@storetransaction');
Route::get('user', 'App\Http\Controllers\apiController@user');
Route::post('user/store', 'App\Http\Controllers\apiController@storeuser');
Route::post('storeuserfoto', 'App\Http\Controllers\apiController@storeuserfoto');
Route::post('updatereservasi', 'App\Http\Controllers\apiController@updatereservasi');


