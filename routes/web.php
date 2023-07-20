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
Route::get('/event',[\App\Http\Controllers\WebController::class,"event"]);
Route::get('/ordered',[\App\Http\Controllers\WebController::class,"ordered"]);
Route::get('/should',[\App\Http\Controllers\WebController::class,"should"]);
Route::get("/ordered/cancel/{order}",[\App\Http\Controllers\WebController::class,"cancelOrder"]);
Route::get("/ordered/received/{order}",[\App\Http\Controllers\WebController::class,"receivedOrder"]);
Route::get('/cart',[\App\Http\Controllers\WebController::class,"cart"]);
Route::get('/cart/remove/{product}', [\App\Http\Controllers\WebController::class, 'removeFromCart']);
Route::get("/add-to-cart/{product}",[\App\Http\Controllers\WebController::class,"addToCart"]);
Route::get('/wishlist',[\App\Http\Controllers\WebController::class,"wishlist"]);
Route::get('/wishlist/remove/{product}', [\App\Http\Controllers\WebController::class, 'removeFromWishlist']);
Route::get('/add-to-wishlist/{product}',[\App\Http\Controllers\WebController::class,"addToWishlist"]);
Route::get('/detail/{product:slug}',[\App\Http\Controllers\WebController::class,"detail"]);
Route::get('/event/{event:id}',[\App\Http\Controllers\WebController::class,"detailEvent"]);
Route::get('/checkout',[\App\Http\Controllers\WebController::class,"checkout"]);
Route::post("/checkout",[\App\Http\Controllers\WebController::class,"placeOrder"]);
Route::get("/thank-you/{order}",[\App\Http\Controllers\WebController::class,"thankYou"]);
Route::get("/invoice/{order}",[\App\Http\Controllers\WebController::class,"invoice"]);
Route::get("/ordered/returns/{order}",[\App\Http\Controllers\WebController::class,"returns"]);
Route::get("/ordered/returncomplete/{order}",[\App\Http\Controllers\WebController::class,"returnCompleted"]);
Route::get('success-transaction,{order}', [\App\Http\Controllers\WebController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction/{order}', [\App\Http\Controllers\WebController::class, 'cancelTransaction'])->name('cancelTransaction');




Route::prefix("/admin")->middleware(["auth","admin"])->group(function (){
    Route::get("/",[\App\Http\Controllers\AdminController::class,"dashboard"]);
    Route::get("/orders",[\App\Http\Controllers\AdminController::class,"orders"]);
    Route::get("/new_orders",[\App\Http\Controllers\AdminController::class,"newOrders"]);
    Route::get("/orders_1",[\App\Http\Controllers\AdminController::class,"order_1"]);
    Route::get("/orders_2",[\App\Http\Controllers\AdminController::class,"order_2"]);
    Route::get("/orders_3",[\App\Http\Controllers\AdminController::class,"order_3"]);
    Route::get("/orders_4",[\App\Http\Controllers\AdminController::class,"order_4"]);
    Route::get("/orders_5",[\App\Http\Controllers\AdminController::class,"order_5"]);
    Route::get("/orders_6",[\App\Http\Controllers\AdminController::class,"order_6"]);
    Route::get("/orders_7",[\App\Http\Controllers\AdminController::class,"order_7"]);
    Route::get("/orders_8",[\App\Http\Controllers\AdminController::class,"order_8"]);
    Route::get("/orders_9",[\App\Http\Controllers\AdminController::class,"order_9"]);
    Route::get("/orders/{order}",[\App\Http\Controllers\AdminController::class,"invoice"]);
    Route::get("/orders/confirm/{order}",[\App\Http\Controllers\AdminController::class,"confirm"]);
    Route::get("/orders/cancel/{order}",[\App\Http\Controllers\AdminController::class,"cancel"]);
    Route::get("/orders/shipping/{order}",[\App\Http\Controllers\AdminController::class,"shipping"]);
    Route::get("/orders/shipped/{order}",[\App\Http\Controllers\AdminController::class,"shipped"]);
    Route::get("/orders/complete/{order}",[\App\Http\Controllers\AdminController::class,"complete"]);
    Route::get("/orders/returns/{order}",[\App\Http\Controllers\AdminController::class,"returns"]);
    Route::get("/orders/returnfailed/{order}",[\App\Http\Controllers\AdminController::class,"returnFailed"]);
    Route::get("/orders/returnconfirm/{order}",[\App\Http\Controllers\AdminController::class,"returnConfirmed"]);
    Route::get("/orders/returncomplete/{order}",[\App\Http\Controllers\AdminController::class,"returnCompleted"]);
    Route::get("/change_password/{user}",[\App\Http\Controllers\WebController::class,"changePassword"]);
    Route::post("/change_password/{user}",[\App\Http\Controllers\WebController::class,"savePassword"]);

    Route::get("/products",[\App\Http\Controllers\AdminController::class,"products"]);
    Route::get("/products/create",[\App\Http\Controllers\AdminController::class,"productCreate"]);
    Route::post("/products/update/{product}",[\App\Http\Controllers\AdminController::class,"productUpdate"]);
    Route::get("/products/edit/{product}",[\App\Http\Controllers\AdminController::class,"productEdit"]);
    Route::post("/products/create",[\App\Http\Controllers\AdminController::class,"productSave"]);
    Route::get("/products/delete/{product}",[\App\Http\Controllers\AdminController::class,"productDelete"]);
    Route::get("/product_category/{category:id}",[\App\Http\Controllers\AdminController::class,"products_category"]);

    Route::get("/events",[\App\Http\Controllers\AdminController::class,"events"]);
    Route::get("/events/create",[\App\Http\Controllers\AdminController::class,"eventCreate"]);
    Route::post("/events/create",[\App\Http\Controllers\AdminController::class,"eventSave"]);
    Route::get("/events/edit/{event}",[\App\Http\Controllers\AdminController::class,"eventEdit"]);
    Route::post("/events/update/{event}",[\App\Http\Controllers\AdminController::class,"eventUpdate"]);
    Route::get("/events/delete/{event}",[\App\Http\Controllers\AdminController::class,"eventDelete"]);

    Route::get("/users",[\App\Http\Controllers\AdminController::class,"users"]);
    Route::get("/users/delete/{user}",[\App\Http\Controllers\AdminController::class,"blockUser"]);


});
