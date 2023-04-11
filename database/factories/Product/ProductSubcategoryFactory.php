<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product\ProductSubcategory;

class ProductSubcategoryFactory extends Factory
{
    protected $model = ProductSubcategory::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'category_id' => 1,
            'name' => 'Surveillance',
            'slug' => 'cameras_surveillance',
            'description' => "These are surveillance devices.",
            'attributes' => ["Product number","UPC","Camera","Resolution","Video Format","Battery","Estimated Battery Life","Connection","Detection distance","Size (H x W x D)","Weight"],
            'image_url' => 'subcategory_cameras_accessories_icon.png',
            ];
    }
}
