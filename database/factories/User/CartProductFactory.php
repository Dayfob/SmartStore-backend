<?php

namespace Database\Factories\User;

use App\Models\User\CartProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartProductFactory extends Factory
{
    protected $model = CartProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'cart_id' => 1,
            'item_id' => 1,
            'item_amount' => 1,
        ];
    }
}
