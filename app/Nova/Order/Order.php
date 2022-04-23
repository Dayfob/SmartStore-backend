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

class Order extends Resource
{
    public static string $model = \App\Models\Order\Order::class;

    public static $title = 'id';
    public static $group = 'Клиенты';
    public static string $icon = 'M20 9v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2zm0-2V5H4v2h16zM6 9v10h12V9H6zm4 2h4a1 1 0 0 1 0 2h-4a1 1 0 0 1 0-2z';

    public static $search = [
        'id', 'user_id',
    ];

    public static function label()
    {
        return 'Заказы';
    }

    public static function singularLabel()
    {
        return 'Заказ';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Select::make('Статус', 'status')
                ->options([
                    'Новый' => 'Новый',
                    'В работе' => 'В работе',
                    'Отменен' => 'Отменен',
                ])
                ->sortable(),

            BelongsTo::make('Пользователь', 'user_id', '\App\Nova\User\User')
                ->searchable()
                ->sortable(),

            Text::make('Сумма заказа', 'total_price'),
            Boolean::make('Отправлен', 'is_sent'),
            Boolean::make('Оплачен', 'is_paid'),

            Select::make('Способ оплаты', 'payment_method')
                ->options([
                    'Оплата по карте' => 'Оплата по карте',
                    'Оплата наличными' => 'Оплата наличными',
                ])
                ->nullable(),

            Select::make('Способ доставки', 'delivery_method')
                ->options([
                    'Доставка до дома' => 'Доставка до дома',
                    'Доставка до пункта выдачи' => 'Доставка до пункта выдачи',
                ])
                ->nullable(),

            Text::make('Адрес', 'address')->nullable(),
            Text::make('Доп. Информация', 'additional_information')->nullable(),
            Text::make('Стоимость доставки', 'delivery_price')->default('0'),

            HasMany::make('Содержимое заказа', 'products', '\App\Nova\Order\OrderProduct'),
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
