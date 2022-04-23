<?php

namespace App\Nova\Product;

use App\Models\Product\ProductCategory;
use App\Models\Product\ProductSubcategory;
use Illuminate\Http\Request;
use App\Nova\Resource;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use App\Models\Product\ProductBrand;

class Product extends Resource
{
    public static string $model = \App\Models\Product\Product::class;

    public static $title = 'title';
    public static $group = 'Склад';
    public static string $icon = 'M20 9v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2zm0-2V5H4v2h16zM6 9v10h12V9H6zm4 2h4a1 1 0 0 1 0 2h-4a1 1 0 0 1 0-2z';

    public static $search = [
        'id', 'name', 'slug'
    ];

    public static function label()
    {
        return 'Товары';
    }

    public static function singularLabel()
    {
        return 'Товар';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'name')->sortable(),
            Text::make('Адрес', 'slug')->sortable()->showOnDetail(),
            Image::make('Изображение', 'image_url')->nullable(),
            Text::make('Описание', 'description'),
            Select::make('Бренд', 'brand_id')->options(ProductBrand::pluck('product_brands.id', 'product_brands.name')),
            Select::make('Категория', 'category_id')->options(ProductCategory::pluck('product_categories.id', 'product_categories.name')),
            Select::make('Подкатегория', 'subcategory_id')->options(ProductSubcategory::pluck('product_category_subcategories.id', 'product_category_subcategories.name')),
            Text::make('Количество', 'amount_left'),
            Text::make('Цена', 'price'),
            HasMany::make('Доп. Изображения', 'images', '\App\Nova\Product\ProductImage'),
        ];
    }

    public function cards(Request $request)
    {
        return [];
    }

    public function filters(Request $request)
    {
        return [];
    }

    public function lenses(Request $request)
    {
        return [];
    }

    public function actions(Request $request)
    {
        return [];
    }
}
