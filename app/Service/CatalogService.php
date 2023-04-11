<?php

namespace App\Service;

use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use stdClass;

class CatalogService
{
    public function prepareCategoriesForResponse(ProductCategory $category): stdClass
    {
        $categoriesResponse = new stdClass();
        $subcategories = [];

        $categoriesResponse->id = $category->id;
        $categoriesResponse->name = $category->name;
        $categoriesResponse->slug = $category->slug;
        $categoriesResponse->description = $category->description;
        foreach ($category->subcategories as $subcategory) {
            $subcategory->image_url = asset('storage/' . $subcategory->image_url);
            $subcategories[] = $subcategory;
        }
        $categoriesResponse->subcategories = $subcategories;
        $categoriesResponse->created_at = $category->created_at;
        $categoriesResponse->updated_at = $category->updated_at;

        return $categoriesResponse;
    }
}
