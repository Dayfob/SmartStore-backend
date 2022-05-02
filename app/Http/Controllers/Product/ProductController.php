<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\User\Wishlist;
use App\Models\User\WishlistProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class ProductController extends Controller
{
    public function getProducts(Request $request)
    {
        $products = Product::all();

        foreach ($products as $product) {
            $productsResponse = new stdClass();
            $productsResponse->id = $product->id;
            $productsResponse->name = $product->name;
            $productsResponse->slug = $product->slug;
            $productsResponse->image_url = asset('storage/' . $product->image_url);
            $productsResponse->description = $product->description;
            $productsResponse->brand_id = $product->brand;
            $productsResponse->category_id = $product->category;
            $productsResponse->subcategory_id = $product->subcategory;
            $productsResponse->amount_left = $product->amount_left;
            $productsResponse->price = $product->price;
            $productsResponse->attributes = $product->attributes;
            $productsResponse->liked = false;

            if ($user = Auth::user()) { // это не работает из-за отсутствия middleware sanctum в маршрутах
                $wishlist = Wishlist::whereUserId($user->id)->first();
                $wishlistProducts = WishlistProduct::whereWishlistId($wishlist->id)->get();
                foreach ($wishlistProducts as $wishlistProduct) {
                    if ($wishlistProduct->item_id === $product->id) {
                        $productsResponse->liked = true;
                    }
                }
            }
            $responseArray[] = $productsResponse;
        }

        return response()->json($responseArray);
    }

    public function getCategoryProducts(Request $request)
    {
        $categoryId = $request->input('category_id');
        $products = Product::whereCategoryId($categoryId)->get();

        foreach ($products as $product) {
            $productsResponse = new stdClass();
            $productsResponse->id = $product->id;
            $productsResponse->name = $product->name;
            $productsResponse->slug = $product->slug;
            $productsResponse->image_url = asset('storage/' . $product->image_url);
            $productsResponse->description = $product->description;
            $productsResponse->brand_id = $product->brand;
            $productsResponse->category_id = $product->category;
            $productsResponse->subcategory_id = $product->subcategory;
            $productsResponse->amount_left = $product->amount_left;
            $productsResponse->price = $product->price;
            $productsResponse->attributes = $product->attributes;
            $productsResponse->liked = false;

            if ($user = Auth::user()) {
                $wishlist = Wishlist::whereUserId($user->id)->first();
                $wishlistProducts = WishlistProduct::whereWishlistId($wishlist->id)->get();
                foreach ($wishlistProducts as $wishlistProduct) {
                    if ($wishlistProduct->item_id === $product->id) {
                        $productsResponse->liked = true;
                    }
                }
            }
            $responseArray[] = $productsResponse;
        }

        return response()->json($responseArray);
    }

    public function getSubcategoryProducts(Request $request)
    {
        $subcategoryId = $request->input('subcategory_id');
        $products = Product::whereSubcategoryId($subcategoryId)->get();

        foreach ($products as $product) {
            $productsResponse = new stdClass();
            $productsResponse->id = $product->id;
            $productsResponse->name = $product->name;
            $productsResponse->slug = $product->slug;
            $productsResponse->image_url = asset('storage/' . $product->image_url);
            $productsResponse->description = $product->description;
            $productsResponse->brand_id = $product->brand;
            $productsResponse->category_id = $product->category;
            $productsResponse->subcategory_id = $product->subcategory;
            $productsResponse->amount_left = $product->amount_left;
            $productsResponse->price = $product->price;
            $productsResponse->attributes = $product->attributes;
            $productsResponse->liked = false;

            if ($user = Auth::user()) {
                $wishlist = Wishlist::whereUserId($user->id)->first();
                $wishlistProducts = WishlistProduct::whereWishlistId($wishlist->id)->get();
                foreach ($wishlistProducts as $wishlistProduct) {
                    if ($wishlistProduct->item_id === $product->id) {
                        $productsResponse->liked = true;
                    }
                }
            }
            $responseArray[] = $productsResponse;
        }

        return response()->json($responseArray);
    }

    public function getBrandProducts(Request $request)
    {
        $brandId = $request->input('brand_id');
        $products = Product::whereBrandId($brandId)->get();

        foreach ($products as $product) {
            $productsResponse = new stdClass();
            $productsResponse->id = $product->id;
            $productsResponse->name = $product->name;
            $productsResponse->slug = $product->slug;
            $productsResponse->image_url = asset('storage/' . $product->image_url);
            $productsResponse->description = $product->description;
            $productsResponse->brand_id = $product->brand;
            $productsResponse->category_id = $product->category;
            $productsResponse->subcategory_id = $product->subcategory;
            $productsResponse->amount_left = $product->amount_left;
            $productsResponse->price = $product->price;
            $productsResponse->attributes = $product->attributes;
            $productsResponse->liked = false;

            if ($user = Auth::user()) {
                $wishlist = Wishlist::whereUserId($user->id)->first();
                $wishlistProducts = WishlistProduct::whereWishlistId($wishlist->id)->get();
                foreach ($wishlistProducts as $wishlistProduct) {
                    if ($wishlistProduct->item_id === $product->id) {
                        $productsResponse->liked = true;
                    }
                }
            }
            $responseArray[] = $productsResponse;
        }

        return response()->json($responseArray);
    }

    public function getProduct(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::whereId($productId)->first();

        $productsResponse = new stdClass();
        $productsResponse->id = $product->id;
        $productsResponse->name = $product->name;
        $productsResponse->slug = $product->slug;
        $productsResponse->image_url = asset('storage/' . $product->image_url);
        $productsResponse->description = $product->description;
        $productsResponse->brand_id = $product->brand;
        $productsResponse->category_id = $product->category;
        $productsResponse->subcategory_id = $product->subcategory;
        $productsResponse->amount_left = $product->amount_left;
        $productsResponse->price = $product->price;
        $productsResponse->attributes = $product->attributes;
        $productsResponse->liked = false;

        if ($user = Auth::user()) {
            $wishlist = Wishlist::whereUserId($user->id)->first();
            $wishlistProducts = WishlistProduct::whereWishlistId($wishlist->id)->get();
            foreach ($wishlistProducts as $wishlistProduct) {
                if ($wishlistProduct->item_id === $product->id) {
                    $productsResponse->liked = true;
                }
            }
        }

        return response()->json($productsResponse);
    }
}
