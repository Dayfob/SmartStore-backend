<?php

namespace App\Service;

use App\Models\Product\Product;
use App\Models\User\Wishlist;
use App\Models\User\WishlistProduct;
use Illuminate\Support\Facades\Auth;
use stdClass;

class ProductService
{
    public function getProducts($products)
    {
        $responseArray = [];

        foreach ($products as $product) {
            $productsResponse = (new self())->prepareProductForResponse($product);

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

        return $responseArray;
    }

    public function prepareProductForResponse(Product $product): stdClass
    {
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

        return $productsResponse;
    }

    public function checkIsLiked(Product $product, $productsResponse)
    {
        if ($user = Auth::user()) {
            $wishlist = Wishlist::whereUserId($user->id)->first();
            $wishlistProducts = WishlistProduct::whereWishlistId($wishlist->id)->get();
            foreach ($wishlistProducts as $wishlistProduct) {
                if ($wishlistProduct->item_id === $product->id) {
                    $productsResponse->liked = true;
                }
            }
        }

        return $productsResponse;
    }
}
