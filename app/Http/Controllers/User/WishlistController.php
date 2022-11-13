<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\User\Wishlist;
use App\Models\User\WishlistProduct;
use App\Service\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use stdClass;

class WishlistController extends Controller
{
    public function getWishlist(): JsonResponse
    {
        $user = Auth::user();

        $wishlist = Wishlist::whereUserId($user->id)->first();
        $wishlistProducts = WishlistProduct::whereWishlistId($wishlist->id)
            ->orderBy('created_at', 'DESC')->get();

        $wishlist->user_id = $wishlist->user;
        foreach ($wishlistProducts as $wishlistProduct) {
            $wishlistProductId = $wishlistProduct->item_id;
            $product = Product::whereId($wishlistProductId)->first();

            $productResponse = (new ProductService())->prepareProductForResponse($product);
            $wishlistProduct->item_id = $productResponse;
        }

        $data = [
            "wishlist" => $wishlist,
            "wishlistProducts" => $wishlistProducts
        ];

        return response()->json($data);
    }

    public function addProduct(Request $request): JsonResponse|bool
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

    public function deleteProduct(Request $request): JsonResponse|bool
    {
        $user = Auth::user();
        $wishlist = Wishlist::whereUserId($user->id)->first();
        $item_id = $request->get("item_id");

        if (WishlistProduct::where('wishlist_id', $wishlist->id)->where('item_id', $item_id)->delete()) {
            return response()->json("Successful response");
        }
        return response()->json()->isServerError();
    }
}
