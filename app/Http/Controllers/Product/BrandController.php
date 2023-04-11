<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductBrand;
use Illuminate\Http\JsonResponse;

class BrandController extends Controller
{
    public function getBrands(): JsonResponse
    {
        $brands = ProductBrand::all();
        return response()->json($brands);
    }
}
