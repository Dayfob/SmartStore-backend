<?php

namespace Database\Factories\Product;

use App\Models\Product\ProductBrand;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductBrandFactory extends Factory
{
    protected $model = ProductBrand::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'name' => 'Honeywell',
            'slug' => 'honeywell',
            'description' => "This is Honeywell.",
        ];
    }
}
