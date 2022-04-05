<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Wishlist;
use App\Models\User\WishlistProduct;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function getWishlist()
    {
        $user = Auth::user();

        $wishlist = Wishlist::whereUserId($user->id)->get();
        $wishlistProducts = WishlistProduct::whereWishlistId($wishlist->id)->get();

        $data = [
            "wishlist" => $wishlist,
            "wishlistProducts" => $wishlistProducts];

        return response()->json($data);
    }

    public function addProduct()
    {

    }

    public function deleteProduct()
    {

    }
}
