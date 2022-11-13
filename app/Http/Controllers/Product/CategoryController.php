<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductCategory;
use App\Service\CatalogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use stdClass;

class CategoryController extends Controller
{
    public function getCategories(): JsonResponse
    {
        $categories = ProductCategory::all();
        $responseArray = [];

        foreach ($categories as $category) {
            $categoriesResponse = (new CatalogService())->prepareCategoriesForResponse($category);
            $responseArray[] = $categoriesResponse;
        }

        return response()->json($responseArray);
    }
}
