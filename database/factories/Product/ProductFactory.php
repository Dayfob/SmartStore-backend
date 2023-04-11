<?php

namespace Database\Factories\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'name' => 'Honeywell Smart Home Security Indoor Motion Monitoring System',
            'slug' => 'honeywell_smart_home_security',
            'image_url' => 'product1.jpg',
            'description' => "Expand your system so you can keep track of more rooms in the house. Take outdoor awareness with up to 23 feet (7m) long distance detection and 90 degree field of view. Night vision means it's on the watch around the clock, with a 2 year battery (Battery life varies with typical usage.) Small animal (up to 79 lb.) will not cause false alarms, so don't worry about your pet calling the system.",
            'brand_id' => 1,
            'category_id' => 1,
            'subcategory_id' => 1,
            'amount_left' => 100,
            'price' => 60990,
            'attributes' => ["RCHSIMV1\/W","085267439022","90 field of view","QVGA (320x240)","10 seconds color video clipH.264 @ 10fps","Lithium 3 CR123A","Up to 2 years based on typical usage","Protocol Honeywell Secure Wiselink","up to 7 meters","125,7 x 50,8 x 46,2 \u043c\u043c","With sliding plate 165 g; With table mount 180 g"],
        ];
    }
}
