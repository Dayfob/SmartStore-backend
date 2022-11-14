<?php

namespace Tests\Feature;

use App\Models\Product\Product;
use App\Models\User\Cart;
use App\Models\User\CartProduct;
use App\Models\User\User;
use App\Models\User\Wishlist;
use App\Models\User\WishlistProduct;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartControllerTest extends TestCase
{
    use RefreshDatabase;

    private Collection|Model $user;
    private Collection|Model $cart;
    private Collection|Model $product;
    private Collection|Model $cartProduct;
    private Collection|Model $wishlist;
    private Collection|Model $wishlistProduct;

    public function setUp(): void
    {
        parent::setUp();

        $this->product = Product::factory()->create();
        $this->user = User::factory()->create();
        $this->cart = Cart::factory()->create();
        $this->cartProduct = CartProduct::factory()->create();
        $this->wishlist = Wishlist::factory()->create();
        $this->wishlistProduct = WishlistProduct::factory()->create();
    }

    public function testAddProduct(): void
    {
        $user = User::whereId(1)->first();
        $response = $this->actingAs($user)->withHeaders([
            'X-Header' => 'Value',
        ])->post('/api/user/cart/add_product', ['item_id' => 1, "item_amount" => 1]);

        $response->assertStatus(200);
    }

    public function testUpdateProduct(): void
    {
        $user = User::whereId(1)->first();
        $response = $this->actingAs($user)->withHeaders([
            'X-Header' => 'Value',
        ])->post('/api/user/cart/update_product', ['item_id' => 1, "item_amount" => 2]);

        $response->assertStatus(200);
    }

    public function testDeleteProduct(): void
    {
        $user = User::whereId(1)->first();
        $response = $this->actingAs($user)->withHeaders([
            'X-Header' => 'Value',
        ])->post('/api/user/cart/delete_product', ['item_id' => 1]);

        $response->assertStatus(200);
    }

    public function testGetCart(): void
    {
        $user = User::whereId(1)->first();
        $response = $this->actingAs($user)->withHeaders([
            'X-Header' => 'Value',
        ])->get('/api/user/cart/my_cart');

        $response->assertStatus(200);
    }
}
