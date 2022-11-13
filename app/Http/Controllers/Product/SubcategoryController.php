<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductSubcategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function getSubcategories(Request $request): JsonResponse
    {
        $subcategoryId = $request->input('category_id');
        $subcategories = ProductSubcategory::whereCategoryId($subcategoryId)->get();

        foreach ($subcategories as $subcategory) {
            $subcategory->category_id = $subcategory->category;
            $subcategory->image_url = asset('storage/' . $subcategory->image_url);
        }

        return response()->json($subcategories);
    }

    public function getAllSubcategories(): JsonResponse
    {
        $subcategories = ProductSubcategory::all();

        foreach ($subcategories as $subcategory) {
            $subcategory->category_id = $subcategory->category;
            $subcategory->image_url = asset('storage/' . $subcategory->image_url);
        }

        return response()->json($subcategories);
    }
}
