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

    public static $title = 'id';
    public static $group = 'Clients';
    public static string $icon = 'M20 9v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2zm0-2V5H4v2h16zM6 9v10h12V9H6zm4 2h4a1 1 0 0 1 0 2h-4a1 1 0 0 1 0-2z';

    public static $search = [
        'id', 'order_id', 'item_id'
    ];

    public static function label()
    {
        return 'Order products';
    }

    public static function singularLabel()
    {
        return 'Order product';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Order', 'order', \App\Nova\Order\Order::class)
                ->searchable()
                ->sortable()
                ->onlyOnIndex(),

            BelongsTo::make('Product', 'products', \App\Nova\Product\Product::class)
                ->searchable()
                ->sortable()
                ->onlyOnIndex(),

            Text::make('Amount', 'item_amount'),
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
