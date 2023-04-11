<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product\ProductCategory;

class ProductCategoryFactory extends Factory
{
    protected $model = ProductCategory::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'name' => 'Cameras',
            'slug' => 'cameras',
            'description' => "These are cameras.",
        ];
    }
}
