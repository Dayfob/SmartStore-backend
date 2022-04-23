<?php

namespace App\Nova\Product;

use App\Models\Product\ProductCategory;
use Illuminate\Http\Request;
use App\Nova\Resource;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use App\Models\Product\ProductBrand;

class ProductSubcategory extends Resource
{
    public static string $model = \App\Models\Product\ProductSubcategory::class;

    public static $title = 'title';
    public static $group = 'Склад';
    public static string $icon = 'M20 9v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2zm0-2V5H4v2h16zM6 9v10h12V9H6zm4 2h4a1 1 0 0 1 0 2h-4a1 1 0 0 1 0-2z';

    public static $search = [
        'id', 'title', 'slug'
    ];

    public static function label()
    {
        return 'Подкатегории';
    }

    public static function singularLabel()
    {
        return 'Подкатегория';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'name')->sortable(),
            Text::make('Адрес', 'slug')->sortable()->showOnDetail(),
            Text::make('Описание', 'description'),
            Select::make('Бренд', 'brand_id')->options(ProductBrand::pluck('product_brands.id', 'product_brands.name')),
            Select::make('Категория', 'category_id')->options(ProductCategory::pluck('product_categories.id', 'product_categories.name')),
            KeyValue::make('Атрибуты', 'attributes')
                ->rules('json')
                ->keyLabel('Название')
                ->valueLabel('Значение')
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
