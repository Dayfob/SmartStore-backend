<?php

use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WishlistController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'], static function () {
    Route::post('login', [UserController::class, 'login']);
    Route::post('register',[UserController::class, 'register']);

    Route::middleware(['auth:sanctum'])-> group(function() {
        Route::get('me', [UserController::class, 'getUser']);
        Route::post('logout', [UserController::class, 'logout']);
        Route::post('update', [UserController::class, 'updateUserData']);

        Route::group(['prefix' => 'cart'], static function () {
            Route::get('my_cart', [CartController::class, 'getCart']);
            Route::post('add_product', [CartController::class, 'addProduct']);
            Route::post('update_product', [CartController::class, 'updateProduct']);
            Route::post('delete_product', [CartController::class, 'deleteProduct']);
        });

        Route::group(['prefix' => 'wishlist'], static function () {
            Route::get('my_wishlist', [WishlistController::class, 'getWishlist']);
            Route::post('add_product', [WishlistController::class, 'addProduct']);
            Route::post('delete_product', [WishlistController::class, 'deleteProduct']);
        });

        Route::group(['prefix' => 'order'], static function () {
            Route::get('all', [OrderController::class, 'getAllOrders']);
            Route::get('my_order', [OrderController::class, 'getOrder']);
            Route::post('create_order', [OrderController::class, 'createOrder']);
//            Route::post('update_order', [OrderController::class, 'updateOrder']);
            Route::post('delete_order', [OrderController::class, 'deleteOrder']);
            Route::post('invoices', [OrderController::class, 'sendInvoice']);
        });
    });
});
