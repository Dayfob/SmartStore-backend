<?php

namespace Tests\Unit;

use App\Models\Product\Product;
use App\Service\CartService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartServiceTest extends TestCase
{
    use RefreshDatabase;
    private CartService $service;

    public function setUp(): void
    {
        parent::setUp();

        $this->service = new CartService();
    }

    public function testCalculateCartCost(): void
    {
        $product = Product::factory()->create();
        $cartTotalPrice = 60990;
        $cartProductId = $product->id;
        $cartItemAmount = 1;
        $itemAmount = 2;

        $cartCost = $this->service->
            calculateCartCost($cartTotalPrice, $cartProductId, $cartItemAmount, $itemAmount);
        $this->assertEquals($product->price * $itemAmount, $cartCost);
    }
}
