<?php
//
//namespace App\Nova\Admin;
//
//use Benjaminhirsch\NovaSlugField\Slug;
//use Benjaminhirsch\NovaSlugField\TextWithSlug;
//use Illuminate\Http\Request;
//use Laravel\Nova\Fields\BelongsToMany;
//use Laravel\Nova\Fields\ID;
//use Laravel\Nova\Fields\Text;
//use Pktharindu\NovaPermissions\Checkboxes;
//use Pktharindu\NovaPermissions\Nova\Role as RoleResource;
//
//class Role extends RoleResource
//{
//    public static $model = \App\Models\Admin\Role::class;
//    public static $group = 'Компания';
//    public static string $icon = 'M11.85 17.56a1.5 1.5 0 0 1-1.06.44H10v.5c0 .83-.67 1.5-1.5 1.5H8v.5c0 .83-.67 1.5-1.5 1.5H4a2 2 0 0 1-2-2v-2.59A2 2 0 0 1 2.59 16l5.56-5.56A7.03 7.03 0 0 1 15 2a7 7 0 1 1-1.44 13.85l-1.7 1.71zm1.12-3.95l.58.18a5 5 0 1 0-3.34-3.34l.18.58L4 17.4V20h2v-.5c0-.83.67-1.5 1.5-1.5H8v-.5c0-.83.67-1.5 1.5-1.5h1.09l2.38-2.39zM18 9a1 1 0 0 1-2 0 1 1 0 0 0-1-1 1 1 0 0 1 0-2 3 3 0 0 1 3 3z';
//
//    public static $title = 'name';
//
//    public static $search = [
//        'id', 'name'
//    ];
//
//    public function fields(Request $request)
//    {
//        return [
//            ID::make()->sortable(),
//
//            TextWithSlug::make('Название', 'name')
//                ->rules('required')
//                ->sortable()
//                ->slug('slug'),
//
//            Slug::make(__('Slug'), 'slug')
//                ->rules('required')
//                ->creationRules('unique:' . config('nova-permissions.table_names.roles', 'roles'))
//                ->updateRules('unique:' . config('nova-permissions.table_names.roles', 'roles') . ',slug,{{resourceId}}')
//                ->sortable()
//                ->hideFromIndex(),
//
//            Checkboxes::make('Права', 'permissions')
//                ->withGroups()
//                ->options(collect(config('nova-permissions.permissions'))->map(function ($permission, $key) {
//                    return [
//                        'group' => __($permission['group']),
//                        'option' => $key,
//                        'label' => __($permission['display_name']),
//                        'description' => __($permission['description']),
//                    ];
//                })->groupBy('group')->toArray()),
//
//            Text::make(__('Пользователей'), function () {
//                return \count($this->users);
//            })->onlyOnIndex(),
//
//            BelongsToMany::make(__('Users'), 'users', config('nova-permissions.user_resource', 'App\Nova\User'))
//                ->searchable(),
//        ];
//    }
//
//    public static function label()
//    {
//        return 'Роли';
//    }
//
//    public static function singularLabel()
//    {
//        return 'Роль';
//    }
//}
