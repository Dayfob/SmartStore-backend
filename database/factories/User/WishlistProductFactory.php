<?php

namespace Database\Factories\User;

use App\Models\User\CartProduct;
use App\Models\User\WishlistProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class WishlistProductFactory extends Factory
{
    protected $model = WishlistProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'wishlist_id' => 1,
            'item_id' => 1,
        ];
    }
}
