<?php

use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'catalog'], static function () {
    Route::get('all', [ProductController::class, 'getProducts']);
    Route::get('category', [ProductController::class, 'getCategoryProducts']);
    Route::get('subcategory', [ProductController::class, 'getSubcategoryProducts']);
    Route::get('brand', [ProductController::class, 'getBrandProducts']);
    Route::get('product', [ProductController::class, 'getProduct']);

    Route::get('categories', [CategoryController::class, 'getCategories']);
    Route::get('subcategories', [SubcategoryController::class, 'getSubcategories']);
    Route::get('all_subcategories', [SubcategoryController::class, 'getAllSubcategories']);
    Route::get('brands', [BrandController::class, 'getBrands']);

    Route::get('news', [NewsController::class, 'getAllNews']);
});
