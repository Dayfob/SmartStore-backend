<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts(Request $request)
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function getCategoryProducts(Request $request)
    {
        $categoryId = $request->get('category_id');
        $products = Product::whereCategoryId($categoryId)->get();
        return response()->json($products);
    }

    public function getSubcategoryProducts(Request $request)
    {
        $subcategoryId = $request->get('subcategory_id');
        $products = Product::whereSubcategoryId($subcategoryId)->get();
        return response()->json($products);
    }

    public function getBrandProducts(Request $request)
    {
        $brandId = $request->get('brand_id');
        $products = Product::whereBrandId($brandId)->get();
        return response()->json($products);
    }

    public function getProduct(Request $request)
    {
        $productId = $request->get('product_id');
        $product = Product::whereId($productId)->get();
        return response()->json($product);
    }

    public function createProduct()
    {

    }

    public function updateProduct()
    {

    }

    public function deleteProduct()
    {

    }
}
