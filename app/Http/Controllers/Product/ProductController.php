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

        foreach ($products as $product){
            $product->brand_id = $product->brand;
            $product->category_id = $product->category;
            $product->subcategory_id = $product->subcategory;
        }

        return response()->json($products);
    }

    public function getCategoryProducts(Request $request)
    {
        $categoryId = $request->get('category_id');
        $products = Product::whereCategoryId($categoryId)->get();

        foreach ($products as $product){
            $product->brand_id = $product->brand;
            $product->category_id = $product->category;
            $product->subcategory_id = $product->subcategory;
        }

        return response()->json($products);
    }

    public function getSubcategoryProducts(Request $request)
    {
        $subcategoryId = $request->get('subcategory_id');
        $products = Product::whereSubcategoryId($subcategoryId)->get();

        foreach ($products as $product){
            $product->brand_id = $product->brand;
            $product->category_id = $product->category;
            $product->subcategory_id = $product->subcategory;
        }

        return response()->json($products);
    }

    public function getBrandProducts(Request $request)
    {
        $brandId = $request->get('brand_id');
        $products = Product::whereBrandId($brandId)->get();

        foreach ($products as $product){
            $product->brand_id = $product->brand;
            $product->category_id = $product->category;
            $product->subcategory_id = $product->subcategory;
        }

        return response()->json($products);
    }

    public function getProduct(Request $request)
    {
        $productId = $request->get('product_id');
        $product = Product::whereId($productId)->first();

        $product->brand_id = $product->brand;
        $product->category_id = $product->category;
        $product->subcategory_id = $product->subcategory;

        return response()->json($product);
    }
}
