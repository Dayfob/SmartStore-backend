<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\User\Wishlist;
use App\Models\User\WishlistProduct;
use App\Service\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class ProductController extends Controller
{
    public function getProducts(): JsonResponse
    {
        $products = Product::all();

        return response()->json((new ProductService())->getProducts($products));
    }

    public function getCategoryProducts(Request $request): JsonResponse
    {
        $categoryId = $request->input('category_id');
        $products = Product::whereCategoryId($categoryId)->get();

        return response()->json((new ProductService())->getProducts($products));
    }

    public function getSubcategoryProducts(Request $request): JsonResponse
    {
        $subcategoryId = $request->input('subcategory_id');
        $products = Product::whereSubcategoryId($subcategoryId)->get();
        $responseArray = [];

        foreach ($products as $product) {
            $productsResponse = (new ProductService())->prepareProductForResponse($product);
            $responseArray[] = (new ProductService())->checkIsLiked($product, $productsResponse);
        }

        return response()->json($responseArray);
    }

    public function getBrandProducts(Request $request): JsonResponse
    {
        $brandId = $request->input('brand_id');
        $products = Product::whereBrandId($brandId)->get();
        $responseArray = [];

        foreach ($products as $product) {
            $productsResponse = (new ProductService())->prepareProductForResponse($product);
            $responseArray[] = (new ProductService())->checkIsLiked($product, $productsResponse);
        }

        return response()->json($responseArray);
    }

    public function getProduct(Request $request): JsonResponse
    {
        $productId = $request->input('product_id');
        $product = Product::whereId($productId)->first();

        $productsResponse = (new ProductService())->prepareProductForResponse($product);
        $productsResponse = (new ProductService())->checkIsLiked($product, $productsResponse);

        return response()->json($productsResponse);
    }
}
