<?php

namespace Database\Factories\User;

use App\Models\User\Cart;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'status' => '-',
            'user_id' => 1,
            'total_price' => 60990,
        ];
    }
}
