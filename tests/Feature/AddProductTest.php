<?php

namespace Tests\Feature;

use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_addProduct()
    {
        $user = User::whereId(1)->first();
        $response = $this->actingAs($user)->withHeaders([
            'X-Header' => 'Value',
        ])->post('/api/user/cart/add_product', ['item_id' => 1, "item_amount" => 2]);

        $response->assertStatus(200);
    }
}
