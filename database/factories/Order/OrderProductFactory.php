<?php

namespace Database\Factories\Order;

use App\Models\Order\OrderProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderProductFactory extends Factory
{
    protected $model = OrderProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'order_id' => 1,
            'item_id' => 1,
            'item_amount' => 1,
        ];
    }
}
