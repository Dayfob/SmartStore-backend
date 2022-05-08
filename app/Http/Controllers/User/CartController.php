<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\User\CartProduct;
use App\Models\User\Cart;
use App\Models\User\Wishlist;
use App\Models\User\WishlistProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class CartController extends Controller
{
    public function getCart(Request $request)
    {
        $user = Auth::user();

        $cart = Cart::whereUserId($user->id)->first();
        $cartProducts = CartProduct::whereCartId($cart->id)->orderBy('created_at', 'DESC')->get();

        $cart->user_id = $cart->user;
        foreach ($cartProducts as $cartProduct) {
            $product = Product::whereId($cartProduct->item_id)->first();

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

            $cartProduct->item_id = $productsResponse;
        }

        $data = [
            "cart" => $cart,
            "cartProducts" => $cartProducts];

        return response()->json($data);
    }

    public function addProduct(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::whereUserId($user->id)->first();
        $item_id = $request->get("item_id");
        $item_amount = $request->get("item_amount");

        $cartProduct = new CartProduct();
        $cartProduct->cart_id = $cart->id;
        $cartProduct->item_id = $item_id;
        $cartProduct->item_amount = $item_amount;
        $cartProduct->save();

        $product = Product::whereId($cartProduct->item_id)->first();
        $cart->total_price = $cart->total_price + $product->price * $item_amount;

        if ($cartProduct->save() && $cart->save()) {
            return response()->json($cartProduct);
        }
        return response()->json()->isServerError();
    }

    public function updateProduct(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::whereUserId($user->id)->first();
        $item_id = $request->get("item_id");
        $item_amount = $request->get("item_amount");

        $cartProduct = CartProduct::where('cart_id', $cart->id)->where('item_id', $item_id)->get()->first();
        $product = Product::whereId($cartProduct->item_id)->first();

        $cart->total_price = $cart->total_price - $product->price * $cartProduct->item_amount + $product->price * $item_amount;
        $cartProduct->item_amount = $item_amount;

        if ($cartProduct->save() && $cart->save()) {
            return response()->json($cartProduct);
        }
        return response()->json()->isServerError();
    }

    public function deleteProduct(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::whereUserId($user->id)->first();
        $item_id = $request->get("item_id");

        $cartProduct = CartProduct::where('cart_id', $cart->id)->where('item_id', $item_id)->first();

        $product = Product::whereId($cartProduct->item_id)->first();
        $cart->total_price = $cart->total_price - $product->price * $cartProduct->item_amount;

        if($cartProduct->delete() && $cart->save()){
            return response()->json("Successful response");
        }

        return response()->json()->isServerError();
    }
}
