<?php

namespace App\Nova\Product;

use Illuminate\Http\Request;
use App\Nova\Resource;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use App\Nova\Product\ProductBrandImage;
use App\Nova\Product\Product;

class ProductBrand extends Resource
{
    public static string $model = \App\Models\Product\ProductBrand::class;

    public static $title = 'name';
    public static $group = 'Warehouse';
    public static string $icon = 'M20 9v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2zm0-2V5H4v2h16zM6 9v10h12V9H6zm4 2h4a1 1 0 0 1 0 2h-4a1 1 0 0 1 0-2z';

    public static $search = [
        'id', 'name', 'slug'
    ];

    public static function label()
    {
        return 'Brands';
    }

    public static function singularLabel()
    {
        return 'Brand';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name', 'name')->sortable(),
            Text::make('Slug', 'slug')->sortable()->showOnDetail(),
            Textarea::make('Description', 'description'),
            HasMany::make('Products', 'products', Product::class),
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
