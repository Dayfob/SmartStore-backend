<?php

namespace Tests\Feature;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Order\Order;
use App\Models\Order\OrderProduct;
use App\Models\Product\Product;
use App\Models\User\Cart;
use App\Models\User\CartProduct;
use App\Models\User\User;
use App\Models\User\Wishlist;
use App\Models\User\WishlistProduct;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    private Collection|Model $user;
    private Collection|Model $cart;
    private Collection|Model $product;
    private Collection|Model $cartProduct;
    private Collection|Model $wishlist;
    private Collection|Model $wishlistProduct;
    private Collection|Model $order;
    private Collection|Model $orderProduct;

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


    public function testDeleteOrder(): void
    {
        $this->order = Order::factory()->create();
        $this->orderProduct = OrderProduct::factory()->create();
        $user = User::whereId(1)->first();
        $response = $this->actingAs($user)->withHeaders([
            'X-Header' => 'Value',
        ])->post('/api/user/order/delete_order', ['order_id' => 1]);

        $response->assertStatus(200);
    }

    public function testCreateOrder(): void
    {
        $user = User::whereId(1)->first();
        $response = $this->actingAs($user)->withHeaders([
            'X-Header' => 'Value',
        ])->post('/api/user/order/create_order', [
            'delivery_method' => 'Delivery to address',
            "payment_method" => 'Card payment',
            "address" => 'Almaty, Test, 2',
        ]);

        $response->assertStatus(200);
    }

    public function testGetOrder(): void
    {
        $this->order = Order::factory()->create();
        $this->orderProduct = OrderProduct::factory()->create();
        $user = User::whereId(1)->first();
        $response = $this->actingAs($user)->withHeaders([
            'X-Header' => 'Value',
        ])->get('/api/user/order/my_order' . '?order_id=' . '1');

        $response->assertStatus(200);
    }

    public function testGetAllOrders(): void
    {
        $this->order = Order::factory()->create();
        $this->orderProduct = OrderProduct::factory()->create();
        $user = User::whereId(1)->first();
        $response = $this->actingAs($user)->withHeaders([
            'X-Header' => 'Value',
        ])->get('/api/user/order/all');

        $response->assertStatus(200);
    }
}
