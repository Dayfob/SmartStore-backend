<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = ProductCategory::all();
        return response()->json($categories);
    }

    public function createCategory(Request $request)
    {

    }

    public function updateCategory(Request $request)
    {

    }

    public function deleteCategory(Request $request)
    {

    }
}
