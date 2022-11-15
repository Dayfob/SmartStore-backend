<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductSubcategory;

class SubcategoryControllerTest extends TestCase
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

    public function testGetSubcategories(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->get('/api/catalog/subcategories' . '?category_id=' . '1');

        $response->assertStatus(200);
    }

    public function testGetAllSubcategories(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->get('/api/catalog/all_subcategories');

        $response->assertStatus(200);
    }
}
