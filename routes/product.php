<?php

use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\Warehouse\LeftoversController;
//use App\Http\Controllers\Warehouse\PriceController;

Route::group(['prefix' => 'catalog'], function () {
    Route::get('all', [ProductController::class, 'getProducts']);
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
