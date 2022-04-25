<?php

use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\SubcategoryController;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\Warehouse\LeftoversController;
//use App\Http\Controllers\Warehouse\PriceController;

Route::group(['prefix' => 'catalog'], function () {
    Route::get('all', [ProductController::class, 'getProducts']);
    Route::get('category', [ProductController::class, 'getCategoryProducts']);
    Route::get('subcategory', [ProductController::class, 'getSubcategoryProducts']);
    Route::get('brand', [ProductController::class, 'getBrandProducts']);
    Route::get('product', [ProductController::class, 'getProduct']);

    Route::get('categories', [CategoryController::class, 'getCategories']);
    Route::get('subcategories', [SubcategoryController::class, 'getSubcategories']);
    Route::get('brands', [BrandController::class, 'getBrands']);
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
