<?php

namespace App\Nova\Product;

use Illuminate\Http\Request;
use App\Nova\Resource;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use App\Models\Product\ProductCategory;
use Laravel\Nova\Fields\Textarea;

class ProductSubcategory extends Resource
{
    public static string $model = \App\Models\Product\ProductSubcategory::class;

    public static $title = 'name';
    public static $group = 'Warehouse';
    public static string $icon = 'M20 9v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2zm0-2V5H4v2h16zM6 9v10h12V9H6zm4 2h4a1 1 0 0 1 0 2h-4a1 1 0 0 1 0-2z';

    public static $search = [
        'id', 'title', 'slug'
    ];

    public static function label()
    {
        return 'Subcategories';
    }

    public static function singularLabel()
    {
        return 'Subcategory';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name', 'name')->sortable(),
            Text::make('Slug', 'slug')->sortable()->showOnDetail(),
            Textarea::make('Description', 'description'),
            BelongsTo::make('Category', 'category', \App\Nova\Product\ProductCategory::class)
                ->searchable()
                ->sortable()
                ->onlyOnIndex(),
            HasMany::make('Products', 'products', Product::class),

            KeyValue::make('Attributes', 'attributes')
                ->rules('json')
                ->keyLabel('key')
                ->valueLabel('Value'),
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
