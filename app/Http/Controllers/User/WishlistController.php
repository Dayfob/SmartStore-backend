<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Wishlist;
use App\Models\User\WishlistProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function getWishlist()
    {
        $user = Auth::user();

        $wishlist = Wishlist::whereUserId($user->id)->first();
        $wishlistProducts = WishlistProduct::whereWishlistId($wishlist->id)->get();

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
            return response()->json()->isSuccessful();
        }
        return response()->json()->isServerError();
    }
}
