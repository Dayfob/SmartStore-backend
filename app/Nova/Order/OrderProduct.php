<?php

namespace App\Nova\Order;

use App\Models\Product\Product;
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
use App\Models\Order\Order;

class OrderProduct extends Resource
{
    public static string $model = \App\Models\Order\OrderProduct::class;

    public static $title = 'title';
    public static $group = 'Склад';
    public static string $icon = 'M20 9v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2zm0-2V5H4v2h16zM6 9v10h12V9H6zm4 2h4a1 1 0 0 1 0 2h-4a1 1 0 0 1 0-2z';

    public static $search = [
        'id', 'order_id', 'item_id'
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

            Select::make('Заказ', 'order_id')
                ->options(Order::pluck('order_orders.id'))
                ->showOnCreating(),

            Select::make('Товар', 'item_id')
                ->options(Product::pluck('product_products.id', 'product_products.name'))
                ->showOnCreating(),

            Text::make('Количество', 'item_amount'),

            BelongsTo::make('Заказ', 'order_id', '\App\Nova\Order\Order')
                ->searchable()
                ->sortable()
                ->onlyOnIndex(),

            BelongsTo::make('Товар', 'item_id', '\App\Nova\Product\Product')
                ->searchable()
                ->sortable()
                ->onlyOnIndex(),
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
