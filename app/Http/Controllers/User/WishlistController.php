<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\User\Wishlist;
use App\Models\User\WishlistProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use stdClass;

class WishlistController extends Controller
{
    public function getWishlist()
    {
        $user = Auth::user();

        $wishlist = Wishlist::whereUserId($user->id)->first();
        $wishlistProducts = WishlistProduct::whereWishlistId($wishlist->id)->orderBy('created_at', 'DESC')->get();

        $wishlist->user_id = $wishlist->user;
        foreach ($wishlistProducts as $wishlistProduct){
            $wishlistProductId = $wishlistProduct->item_id;
            $product = Product::whereId($wishlistProductId)->first();

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
            $productsResponse->liked = true;

            $wishlistProduct->item_id = $productsResponse;
        }

        $data = [
            "wishlist" => $wishlist,
            "wishlistProducts" => $wishlistProducts];

        return response()->json($data);
    }

    public function addProduct(Request $request)
    {
        $user = Auth::user();
        $wishlist = Wishlist::whereUserId($user->id)->first();
        $item_id = $request->get("item_id");

        $wishlistProduct = new WishlistProduct();
        $wishlistProduct->wishlist_id = $wishlist->id;
        $wishlistProduct->item_id = $item_id;
        $wishlistProduct->save();
        if ($wishlistProduct->save()) {
            return response()->json($wishlistProduct);
        }

        return response()->json()->isServerError();
    }

    public function deleteProduct(Request $request)
    {
        $user = Auth::user();
        $wishlist = Wishlist::whereUserId($user->id)->first();
        $item_id = $request->get("item_id");

        if (WishlistProduct::where('wishlist_id', $wishlist->id)->where('item_id', $item_id)->delete()){
            return response()->json("Successful response");
        }
        return response()->json()->isServerError();
    }
}
