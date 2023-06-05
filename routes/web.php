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

Route::get('/',[\App\Http\Controllers\WebController::class,"home"]);
Route::get('/shop',[\App\Http\Controllers\WebController::class,"shop"]);
Route::get('/about',[\App\Http\Controllers\WebController::class,"about"]);
Route::get('/contact',[\App\Http\Controllers\WebController::class,"contact"]);
Route::get('/cart',[\App\Http\Controllers\WebController::class,"cart"]);
Route::get('/wishlist',[\App\Http\Controllers\WebController::class,"wishlist"]);
Route::get('/detail',[\App\Http\Controllers\WebController::class,"detail"]);
Route::get('/checkout',[\App\Http\Controllers\WebController::class,"checkout"]);

