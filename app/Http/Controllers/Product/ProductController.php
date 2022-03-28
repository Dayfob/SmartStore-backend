<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::all()->toJson();

        return $products;
    }
}
