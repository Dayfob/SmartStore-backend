<?php

namespace App\Nova\Order;

use App\Models\Product\ProductCategory;
use App\Models\Product\ProductSubcategory;
use Illuminate\Http\Request;
use App\Nova\Resource;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use App\Models\Product\ProductBrand;
use App\Nova\Order\OrderProduct;
use App\Nova\User\User;

class Order extends Resource
{
    public static string $model = \App\Models\Order\Order::class;

    public static $group = 'Clients';
    public static string $icon = 'M20 9v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2zm0-2V5H4v2h16zM6 9v10h12V9H6zm4 2h4a1 1 0 0 1 0 2h-4a1 1 0 0 1 0-2z';

    public static $search = [
        'id', 'user_id',
    ];

    public static function label()
    {
        return 'Orders';
    }

    public static function singularLabel()
    {
        return 'Order';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Select::make('Status', 'status')
                ->options([
                    'Waiting for confirmation' => 'Waiting for confirmation',
                    'Has been paid' => 'Has been paid',
                    'Completed' => 'Completed',
                    'Canceled' => 'Canceled',
                ])
                ->sortable(),

            BelongsTo::make('User', 'user', User::class)
                ->searchable()
                ->sortable(),

            Text::make('Total price', 'total_price'),
            Boolean::make('Sent', 'is_sent'),
            Boolean::make('Paid', 'is_paid'),

            Select::make('Payment method', 'payment_method')
                ->options([
                    'Card payment' => 'Card payment',
                    'Cash Payment upon receipt' => 'Cash Payment upon receipt',
                ])
                ->nullable(),

            Select::make('Delivery method', 'delivery_method')
                ->options([
                    'Delivery to address' => 'Delivery to address',
                    'Pickup' => 'Pickup',
                ])
                ->nullable(),

            Text::make('Address', 'address')->nullable(),
            Text::make('Additional information', 'additional_information')->nullable(),
            Text::make('Delivery price', 'delivery_price')->default('0'),

            HasMany::make('Order products', 'products', OrderProduct::class),
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
