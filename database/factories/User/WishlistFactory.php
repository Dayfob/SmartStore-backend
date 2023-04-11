<?php

namespace Database\Factories\User;

use App\Models\User\Wishlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class WishlistFactory extends Factory
{
    protected $model = Wishlist::class;

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
        ];
    }
}
