<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/',[\App\Http\Controllers\WebController::class,"home"]);
Route::get('/home',[\App\Http\Controllers\WebController::class,"success"]);
Route::get('/shop',[\App\Http\Controllers\WebController::class,"shop"]);
Route::get("/search",[\App\Http\Controllers\WebController::class,"search"]);
Route::get("/category/{category:slug}",[\App\Http\Controllers\WebController::class,"category"]);
Route::get('/about',[\App\Http\Controllers\WebController::class,"about"]);
Route::get('/contact',[\App\Http\Controllers\WebController::class,"contact"]);
Route::get('/cart',[\App\Http\Controllers\WebController::class,"cart"]);
Route::get('/cart/remove/{product}', [\App\Http\Controllers\WebController::class, 'removeFromCart'])->name('cart.remove');
Route::get("/add-to-cart/{product}",[\App\Http\Controllers\WebController::class,"addToCart"]);
Route::get('/wishlist',[\App\Http\Controllers\WebController::class,"wishlist"]);
Route::get('/wishlist/remove/{product}', [\App\Http\Controllers\WebController::class, 'removeFromWishlist'])->name('wishlist.remove');
Route::get('/add-to-wishlist/{product}',[\App\Http\Controllers\WebController::class,"addToWishlist"]);
Route::get('/detail/{product:slug}',[\App\Http\Controllers\WebController::class,"detail"]);
Route::get('/checkout',[\App\Http\Controllers\WebController::class,"checkout"]);
Route::post("/checkout",[\App\Http\Controllers\WebController::class,"placeOrder"]);
Route::get("/thank-you/{order}",[\App\Http\Controllers\WebController::class,"thankYou"]);
Route::get('success-transaction,{order}', [\App\Http\Controllers\WebController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction/{order}', [\App\Http\Controllers\WebController::class, 'cancelTransaction'])->name('cancelTransaction');




Route::prefix("/admin")->middleware(["auth","admin"])->group(function (){
    Route::get("/",[\App\Http\Controllers\AdminController::class,"dashboard"]);
    Route::get("/orders",[\App\Http\Controllers\AdminController::class,"orders"]);
    Route::get("/orders/{order}",[\App\Http\Controllers\AdminController::class,"invoice"]);
    Route::get("/orders/confirm/{order}",[\App\Http\Controllers\AdminController::class,"confirm"]);
    Route::get("/orders/cancel/{order}",[\App\Http\Controllers\AdminController::class,"cancel"]);
    Route::get("/orders/shipping/{order}",[\App\Http\Controllers\AdminController::class,"shipping"]);
    Route::get("/orders/shipped/{order}",[\App\Http\Controllers\AdminController::class,"shipped"]);
    Route::get("/orders/complete/{order}",[\App\Http\Controllers\AdminController::class,"complete"]);

    Route::get("/products",[\App\Http\Controllers\AdminController::class,"products"]);
    Route::get("/products/create",[\App\Http\Controllers\AdminController::class,"productCreate"]);
    Route::post("/products/update/{product}",[\App\Http\Controllers\AdminController::class,"productUpdate"]);
    Route::get("/products/edit/{product}",[\App\Http\Controllers\AdminController::class,"productEdit"]);
    Route::post("/products/create",[\App\Http\Controllers\AdminController::class,"productSave"]);
    Route::get("/products/delete/{product}",[\App\Http\Controllers\AdminController::class,"productDelete"]);
});
