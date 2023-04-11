<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product\ProductBrand;

class BrandControllerTest extends TestCase
{
    use RefreshDatabase;

    private Collection|Model $brand;

    public function setUp(): void
    {
        parent::setUp();

        $this->brand = ProductBrand::factory()->create();
    }

    public function testGetBrands(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->get('/api/catalog/brands');

        $response->assertStatus(200);
    }
}
