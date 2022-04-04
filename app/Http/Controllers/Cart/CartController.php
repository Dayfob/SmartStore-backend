<?php

namespace App\Http\Controllers\Cart;

use App\Models\User\CartProduct;
use App\Models\User\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function getCart(Request $request)
    {
        $user = Auth::user();

        $cart = UserCart::whereUserId($user->id)->get();
        $cartProducts = CartProduct::whereCartId($cart->id)->get();

        $data = [$cart, $cartProducts];

//        $products = Product::all()->toJson();
//
//        return $products;
    }

    public function updateCart(Request $request)
    {

    }
}
