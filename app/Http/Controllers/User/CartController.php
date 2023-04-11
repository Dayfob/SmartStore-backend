<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\User\CartProduct;
use App\Models\User\Cart;
use App\Models\User\Wishlist;
use App\Models\User\WishlistProduct;
use App\Service\CartService;
use App\Service\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class CartController extends Controller
{
    public function getCart(): JsonResponse
    {
        $user = Auth::user();

        $cart = Cart::whereUserId($user->id)->first();
        $cartProducts = CartProduct::whereCartId($cart->id)->orderBy('created_at', 'DESC')->get();

        $cart->user_id = $cart->user;
        foreach ($cartProducts as $cartProduct) {
            $product = Product::whereId($cartProduct->item_id)->first();
            $productsResponse = (new ProductService())->prepareProductForResponse($product);
            $cartProduct->item_id = (new ProductService())->checkIsLiked($product, $productsResponse);
        }

        $data = [
            "cart" => $cart,
            "cartProducts" => $cartProducts
        ];

        return response()->json($data);
    }

    public function addProduct(Request $request): JsonResponse|bool
    {
        $user = Auth::user();
        $cart = Cart::whereUserId($user->id)->first();
        $item_id = $request->get("item_id");
        $item_amount = $request->get("item_amount");

        if (CartProduct::where("cart_id", $cart->id)->where("item_id", $item_id)->first()) {
            $cartProduct = CartProduct::where("cart_id", $cart->id)->where("item_id", $item_id)->first();
            $cartProduct->item_amount += $item_amount;
        } else {
            $cartProduct = new CartProduct();
            $cartProduct->cart_id = $cart->id;
            $cartProduct->item_id = $item_id;
            $cartProduct->item_amount = $item_amount;
        }
        $cartProduct->save();

        $cart->total_price = (new CartService())
            ->calculateCartCost($cart->total_price, $cartProduct->item_id, $cartProduct->item_amount, $item_amount);

        if ($cart->save()) {
            return response()->json($cartProduct);
        }

        return response()->json()->isServerError();
    }

    public function updateProduct(Request $request): JsonResponse|bool
    {
        $user = Auth::user();
        $cart = Cart::whereUserId($user->id)->first();
        $item_id = $request->get("item_id");
        $item_amount = $request->get("item_amount");

        $cartProduct = CartProduct::where('cart_id', $cart->id)->where('item_id', $item_id)->get()->first();
        $cart->total_price = (new CartService())
            ->calculateCartCost($cart->total_price, $cartProduct->item_id, $cartProduct->item_amount, $item_amount);
        $cartProduct->item_amount = $item_amount;

        if ($cartProduct->save() && $cart->save()) {
            return response()->json($cartProduct);
        }

        return response()->json()->isServerError();
    }

    public function deleteProduct(Request $request): JsonResponse|bool
    {
        $user = Auth::user();
        $cart = Cart::whereUserId($user->id)->first();
        $item_id = $request->get("item_id");

        $cartProduct = CartProduct::where('cart_id', $cart->id)->where('item_id', $item_id)->first();
        $cart->total_price = (new CartService())
            ->calculateCartCost($cart->total_price, $cartProduct->item_id, $cartProduct->item_amount, 0);

        if ($cartProduct->delete() && $cart->save()) {
            return response()->json("Successful response");
        }

        return response()->json()->isServerError();
    }
}
