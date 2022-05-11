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
use App\Nova\User\UserImage;
use App\Nova\Order\Order;

class User extends Resource
{
    public static string $model = \App\Models\User\User::class;

    public static $title = 'name';
    public static $group = 'Clients';
    public static string $icon = 'M20 9v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2zm0-2V5H4v2h16zM6 9v10h12V9H6zm4 2h4a1 1 0 0 1 0 2h-4a1 1 0 0 1 0-2z';

    public static $search = [
        'id', 'name', 'slug'
    ];

    public static function label()
    {
        return 'Clients';
    }

    public static function singularLabel()
    {
        return 'Client';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('IIN', 'iin')->sortable(),
            Text::make('Name', 'name')->sortable(),
            Text::make('Phone', 'phone_number')->nullable(),
            Text::make('Password', 'password')->hideFromIndex(),
            Boolean::make('Employer', 'employer'),
            HasOne::make('Image', 'image', UserImage::class),
            HasMany::make('Orders', 'orders', Order::class),
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
