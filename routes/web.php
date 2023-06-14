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
Route::get("/search",[\App\Http\Controllers\WebController::class,"search"]);
Route::get("/category/{category:slug}",[\App\Http\Controllers\WebController::class,"category"]);
Route::get('/about',[\App\Http\Controllers\WebController::class,"about"]);
Route::get('/contact',[\App\Http\Controllers\WebController::class,"contact"]);
Route::get('/cart',[\App\Http\Controllers\WebController::class,"cart"]);
Route::get('/cartDelete/{product}',[\App\Http\Controllers\WebController::class,"cartDelete"]);
Route::get("/add-to-cart/{product}",[\App\Http\Controllers\WebController::class,"addToCart"]);
Route::get('/wishlist',[\App\Http\Controllers\WebController::class,"wishlist"]);
Route::get('/add-to-wishlist/{product}',[\App\Http\Controllers\WebController::class,"addToWishlist"]);
Route::get('/detail/{product:slug}',[\App\Http\Controllers\WebController::class,"detail"]);
Route::get('/checkout',[\App\Http\Controllers\WebController::class,"checkout"]);
Route::post("/checkout",[\App\Http\Controllers\WebController::class,"placeOrder"]);
Route::get("/thank-you/{order}",[\App\Http\Controllers\WebController::class,"thankYou"]);
Route::get('success-transaction,{order}', [\App\Http\Controllers\WebController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction/{order}', [\App\Http\Controllers\WebController::class, 'cancelTransaction'])->name('cancelTransaction');

