<?php

namespace App\Nova\User;

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

class User extends Resource
{
    public static string $model = \App\Models\User\User::class;

    public static $title = 'title';
    public static $group = 'Клиенты';
    public static string $icon = 'M20 9v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2zm0-2V5H4v2h16zM6 9v10h12V9H6zm4 2h4a1 1 0 0 1 0 2h-4a1 1 0 0 1 0-2z';

    public static $search = [
        'id', 'name', 'slug'
    ];

    public static function label()
    {
        return 'Клиенты';
    }

    public static function singularLabel()
    {
        return 'Клиент';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('ИИН', 'iin')->sortable(),
            Text::make('Имя', 'name')->sortable(),
            Text::make('Номер', 'phone_number')->nullable(),
            Text::make('Пароль', 'password')->showOnCreating(),
            Boolean::make('Работник', 'employer'),
            HasOne::make('Изображение', 'image', '\App\Nova\User\UserImage'),
            HasMany::make('Заказы', 'orders', '\App\Nova\Order\Order'),
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
