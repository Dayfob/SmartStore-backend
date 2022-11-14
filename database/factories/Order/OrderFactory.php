<?php

namespace Database\Factories\Order;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'status' => 'Waiting for confirmation',
            'user_id' => 1,
            'total_price' => 60990,
            'is_sent' => 0,
            'is_paid' => 0,
            'payment_method' => 'Card payment',
            'delivery_method' => 'Delivery to address',
            'address' => 'Almaty, Test, 2',
            'delivery_price' => 1000,
        ];
    }
}
