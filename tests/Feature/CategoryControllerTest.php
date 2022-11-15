<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductSubcategory;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    private Collection|Model $category;
    private Collection|Model $subcategory;

    public function setUp(): void
    {
        parent::setUp();

        $this->category = ProductCategory::factory()->create();
        $this->subcategory = ProductSubcategory::factory()->create();
    }

    public function testGetCategories(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->get('/api/catalog/categories');

        $response->assertStatus(200);
    }
}
