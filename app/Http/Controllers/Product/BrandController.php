<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductBrand;

class BrandController extends Controller
{
    public function getBrands()
    {
        $brands = ProductBrand::all();
        return response()->json($brands);
    }

    public function getBrand()
    {

    }

    public function createBrand()
    {

    }

    public function updateBrand()
    {

    }

    public function deleteBrand()
    {

    }
}
