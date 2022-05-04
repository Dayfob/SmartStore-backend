<?php

use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WishlistController;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\Warehouse\LeftoversController;
//use App\Http\Controllers\Warehouse\PriceController;

Route::group(['prefix' => 'user'], function () {
    Route::post('login', [UserController::class, 'login']);
    Route::post('register',[UserController::class, 'register']);

//    Route::middleware(['auth:api'])-> group(function() {
    Route::middleware(['auth:sanctum'])-> group(function() {
        Route::get('me', [UserController::class, 'getUser']);
        Route::post('logout', [UserController::class, 'logout']);
        Route::post('update', [UserController::class, 'updateUserData']);

        Route::group(['prefix' => 'cart'], function () {
            Route::get('my_cart', [CartController::class, 'getCart']);
            Route::post('add_product', [CartController::class, 'addProduct']);
            Route::post('update_product', [CartController::class, 'updateProduct']);
            Route::post('delete_product', [CartController::class, 'deleteProduct']);
        });

        Route::group(['prefix' => 'wishlist'], function () {
            Route::get('my_wishlist', [WishlistController::class, 'getWishlist']);
            Route::post('add_product', [WishlistController::class, 'addProduct']);
            Route::post('delete_product', [WishlistController::class, 'deleteProduct']);
        });

        Route::group(['prefix' => 'order'], function () {
            Route::get('all', [OrderController::class, 'getAllOrders']);
            Route::get('my_order', [OrderController::class, 'getOrder']);
            Route::post('create_order', [OrderController::class, 'createOrder']);
//            Route::post('update_order', [OrderController::class, 'updateOrder']);
            Route::post('delete_order', [OrderController::class, 'deleteOrder']);
        });

    });

//    Route::get('search', [LeftoversController::class, 'searchInWarehouses']);
//    Route::get('product', [LeftoversController::class, 'getProductByGuid']);
//    Route::get('crosses', [LeftoversController::class, 'getLaximoCrosses']);
//
//    Route::group(['middleware' => ['auth:web', 'novaAdmin'], 'prefix' => 'price'], function () {
//        Route::get('correlations', [PriceController::class, 'getCorrelations']);
//        Route::get('correlations/{id}', [PriceController::class, 'getCorrelationById']);
//        Route::delete('correlations/{id}', [PriceController::class, 'deleteCorrelationById']);
//        Route::post('createRule', [PriceController::class, 'createRule']);
//        Route::post('updateRule', [PriceController::class, 'updateRule']);
//    });
});
