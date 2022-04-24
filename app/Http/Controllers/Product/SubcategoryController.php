<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductSubcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function getSubcategories(Request $request)
    {
        $subcategoryId = $request->input('category_id');
        $subcategories = ProductSubcategory::whereCategoryId($subcategoryId)->get();
        return response()->json($subcategories);
    }

    public function getAllSubcategories()
    {
        $subcategories = ProductSubcategory::all();
        return response()->json($subcategories);
    }

    public function createSubcategory()
    {

    }

    public function updateSubcategory()
    {

    }

    public function deleteSubcategory()
    {

    }
}
