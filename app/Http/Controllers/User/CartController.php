<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\CartProduct;
use App\Models\User\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getCart(Request $request)
    {
        $user = Auth::user();

        $cart = Cart::whereUserId($user->id)->get();
        $cartProducts = CartProduct::whereCartId($cart->id)->get();

        $data = [
            "cart" => $cart,
            "cartProducts" => $cartProducts];

        return response()->json($data);
    }

    public function addProduct(Request $request)
    {

    }

    public function deleteProduct(Request $request)
    {

    }
}
