<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\User\CartProduct;
use App\Models\User\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getCart(Request $request)
    {
        $user = Auth::user();

        $cart = Cart::whereUserId($user->id)->first();
        $cartProducts = CartProduct::whereCartId($cart->id)->get();

        $cart->user_id = $cart->user;
        foreach ($cartProducts as $cartProduct){
            $product = Product::whereId($cartProduct->item_id)->first();
            $product->brand_id = $product->brand;
            $product->category_id = $product->category;
            $product->subcategory_id = $product->subcategory;
            $cartProduct->item_id = $product;
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
        if ($cartProduct->save()) {
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

        $cartProduct = CartProduct::where('cart_id', $cart->id)->where('item_id', $item_id)->first();
        $cartProduct->item_amount = $item_amount;
        if ($cartProduct->save()){
            return response()->json($cartProduct);
        }
        return response()->json()->isServerError();
    }

    public function deleteProduct(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::whereUserId($user->id)->first();
        $item_id = $request->get("item_id");

       if (CartProduct::where('cart_id', $cart->id)->where('item_id', $item_id)->delete()){
           return response()->json()->isSuccessful();
       }
       return response()->json()->isServerError();
    }
}
