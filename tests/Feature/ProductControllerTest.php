<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product\Product;
use App\Models\Product\ProductBrand;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductSubcategory;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    private Collection|Model $product;
    private Collection|Model $category;
    private Collection|Model $subcategory;
    private Collection|Model $brand;

    public function setUp(): void
    {
        parent::setUp();

        $this->brand = ProductBrand::factory()->create();
        $this->category = ProductCategory::factory()->create();
        $this->subcategory = ProductSubcategory::factory()->create();
        $this->product = Product::factory()->create();
    }

    public function testGetProducts(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->get('/api/catalog/all');

        $response->assertStatus(200);
    }

    public function testGetCategoryProducts(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->get('/api/catalog/all' . '?category_id=' . '1');

        $response->assertStatus(200);
    }

    public function testGetSubcategoryProducts(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->get('/api/catalog/all' . '?subcategory_id=' . '1');

        $response->assertStatus(200);
    }

    public function testGetBrandsProducts(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->get('/api/catalog/all' . '?brand_id=' . '1');

        $response->assertStatus(200);
    }

    public function testGetProduct(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->get('/api/catalog/all' . '?product_id=' . '1');

        $response->assertStatus(200);
    }
}
