<?php

namespace App\Nova\Product;

use Illuminate\Http\Request;
use App\Nova\Resource;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use App\Models\Product\Product;

class ProductImage extends Resource
{
    public static string $model = \App\Models\Product\ProductImage::class;

    public static $title = 'title';
    public static $group = 'Склад';
    public static string $icon = 'M20 9v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2zm0-2V5H4v2h16zM6 9v10h12V9H6zm4 2h4a1 1 0 0 1 0 2h-4a1 1 0 0 1 0-2z';

    public static $search = [
        'id', 'product_id'
    ];

    public static function label()
    {
        return 'Изображения брендов';
    }

    public static function singularLabel()
    {
        return 'Изображение бренда';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Select::make('Товар', 'product_id')->options(Product::pluck('product_products.id', 'product_products.name'))->onlyOnDetail(),
            Image::make('Изображение', 'image')->nullable(),
            BelongsTo::make('Товар', 'product_id', '\App\Nova\Product\Product')->showOnIndex()->searchable(),
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
