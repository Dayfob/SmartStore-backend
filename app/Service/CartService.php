<?php

namespace App\Service;

use App\Models\Product\Product;

class CartService
{
    public function calculateCartCost($cartTotalPrice, $cartProductId, $cartItemAmount, $itemAmount): float|int
    {
        $product = Product::whereId($cartProductId)->first();
        $result = $cartTotalPrice - $product->price * intval($cartItemAmount) + $product->price * intval($itemAmount);

        return max($result, 0);
    }
}
