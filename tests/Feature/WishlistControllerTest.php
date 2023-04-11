<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product\Product;
use App\Models\User\User;
use App\Models\User\Wishlist;
use App\Models\User\WishlistProduct;

class WishlistControllerTest extends TestCase
{
    use RefreshDatabase;

    private Collection|Model $user;
    private Collection|Model $product;
    private Collection|Model $wishlist;
    private Collection|Model $wishlistProduct;

    public function setUp(): void
    {
        parent::setUp();

        $this->product = Product::factory()->create();
        $this->user = User::factory()->create();
        $this->wishlist = Wishlist::factory()->create();
    }

    public function testAddProduct(): void
    {
        $user = User::whereId(1)->first();
        $response = $this->actingAs($user)->withHeaders([
            'X-Header' => 'Value',
        ])->post('/api/user/wishlist/add_product', ['item_id' => 1]);

        $response->assertStatus(200);
    }

    public function testDeleteProduct(): void
    {
        $this->wishlistProduct = WishlistProduct::factory()->create();
        $user = User::whereId(1)->first();
        $response = $this->actingAs($user)->withHeaders([
            'X-Header' => 'Value',
        ])->post('/api/user/wishlist/delete_product', ['item_id' => 1]);

        $response->assertStatus(200);
    }

    public function testGetWishlist(): void
    {
        $user = User::whereId(1)->first();
        $response = $this->actingAs($user)->withHeaders([
            'X-Header' => 'Value',
        ])->get('/api/user/wishlist/my_wishlist');

        $response->assertStatus(200);
    }
}
