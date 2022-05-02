<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductCategory;
use Illuminate\Http\Request;
use stdClass;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = ProductCategory::all();
        foreach($categories as $category){
            $categoriesResponse = new stdClass();
            $subcategories = [];
            $categoriesResponse->id = $category->id;
            $categoriesResponse->name = $category->name;
            $categoriesResponse->slug = $category->slug;
            $categoriesResponse->description = $category->description;
            foreach($category->subcategories as $subcategory){
                $subcategory->image_url = asset('storage/' . $subcategory->image_url);
                $subcategories[] = $subcategory;
            }
            $categoriesResponse->subcategories = $subcategories;
            $categoriesResponse->created_at = $category->created_at;
            $categoriesResponse->updated_at = $category->updated_at;
            $responseArray[] = $categoriesResponse;
        }

        return response()->json($responseArray);
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
