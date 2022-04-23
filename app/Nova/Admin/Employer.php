<?php

namespace App\Nova\Admin;

use Illuminate\Http\Request;
use App\Nova\Resource;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsToMany;

class Employer extends Resource
{
    public static string $model = \App\Models\Admin\Employer::class;
    public static $group = 'Компания';
    public static $title = 'email';
    public static string $icon = 'M19 10h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2h-2a1 1 0 0 1 0-2h2V8a1 1 0 0 1 2 0v2zM9 12A5 5 0 1 1 9 2a5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm8 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h5a5 5 0 0 1 5 5v2z';

    public static $softDeletes = ['deleted_at'];

    public static $search = [
        'id', 'email', 'name'
    ];

    public static function label()
    {
        return 'Работники';
    }

    public static function singularLabel()
    {
        return 'Работник';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Avatar::make('Аватарка', 'avatar')
                ->path('avatars')
                ->preview(function ($value, $disk) {
                    return $value ? Storage::disk($disk)->url($value) : '/images/avatar.png';
                })
                ->hideWhenCreating()
                ->nullable(),

            Text::make('Имя', 'name')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsToMany::make('Роли', 'roles', '\App\Nova\Admin\Role'),

            Text::make('Почтовый ящик', 'email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:admin_employers,email')
                ->updateRules('unique:admin_employers,email,{{resourceId}}'),

            Text::make('ID в Telegram', 'telegram_id')
                ->sortable()
                ->rules('nullable', 'max:255'),

            Boolean::make('Получать уведомления', 'is_telegram_enabled')
                ->rules('required', 'boolean'),

            Password::make('Пароль', 'password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),

            Text::make('Номер телефона', 'phone_number')->nullable(),
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
