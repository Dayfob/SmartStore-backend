<?php
//
//namespace App\Models\Admin;
//
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Gate;
//use Spatie\Permission;
////use Pktharindu\NovaPermissions\Policies\Policy;
//
///**
// * App\Models\Admin\Role
// *
// * @property int $id
// * @property string $slug
// * @property string|null $name
// * @property \Illuminate\Support\Carbon|null $created_at
// * @property \Illuminate\Support\Carbon|null $updated_at
// * @property array $permissions
// * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Employer[] $users
// * @property-read int|null $users_count
// * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
// * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
// * @method static \Illuminate\Database\Eloquent\Builder|Role query()
// * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
// * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
// * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
// * @method static \Illuminate\Database\Eloquent\Builder|Role whereSlug($value)
// * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
// * @mixin \Eloquent
// */
//class Role extends Model
//{
//    protected $fillable = [
//        'slug',
//        'name',
//        'permissions',
//    ];
//
//    protected $appends = [
//        'permissions',
//    ];
//
//    protected $casts = [
//        'permissions' => 'array',
//    ];
//
//    public function __construct(array $attributes = [])
//    {
//        parent::__construct($attributes);
//
//        $this->setTable(config('nova-permissions.table_names.roles', 'roles'));
//    }
//
//    public function users()
//    {
//        return $this->belongsToMany(config('nova-permissions.user_model', 'App\Models\User'), config('nova-permissions.table_names.role_user', 'role_user'), 'role_id', 'user_id');
//    }
//
////    public function getPermissions()
////    {
////        return $this->hasMany(Permission::class);
////    }
//
//    /**
//     * Replace all existing permissions with a new set of permissions.
//     *
//     * @param array $permissions
//     */
//    public function setPermissions(array $permissions)
//    {
//        if (!$this->id) {
//            $this->save();
//        }
//
//        $this->revokeAll();
//
//        collect($permissions)->each(function ($permission) {
//            $this->grant($permission);
//        });
//
//        $this->setRelations([]);
//    }
//
//    /**
//     * Check if a user has a given permission.
//     *
//     * @param string $permission
//     *
//     * @return bool
//     */
//    public function hasPermission($permission)
//    {
//        return $this->getPermissions->contains('permission_slug', $permission);
//    }
//
//    /**
//     * Give Permission to a Role.
//     *
//     * @param string $permission
//     *
//     * @return bool
//     */
//    public function grant($permission)
//    {
//        if ($this->hasPermission($permission)) {
//            return true;
//        }
//
//        $abbilities = array_keys(Gate::abilities());
//        $exist = in_array($permission, $abbilities);
//
//        if (!$exist) {
//            abort(403, 'Unknown permission');
//        }
//
//        return Permission::create([
//            'role_id' => $this->id,
//            'permission_slug' => $permission,
//        ]);
//    }
//
//    /**
//     * Revokes a Permission from a Role.
//     *
//     * @param string $permission
//     *
//     * @return bool
//     */
//    public function revoke($permission)
//    {
//        if (\is_string($permission)) {
//            Permission::findOrFail($permission)->delete();
//
//            $this->setRelations([]);
//
//            return true;
//        }
//
//        return false;
//    }
//
//    /**
//     * Remove all permissions from this Role.
//     */
//    public function revokeAll()
//    {
//        $this->getPermissions()->delete();
//
//        $this->setRelations([]);
//
//        return true;
//    }
//
//    /**
//     * Get a list of permissions.
//     *
//     * @return array
//     */
//    public function getPermissionsAttribute()
//    {
//        return Permission::where('role_id', $this->id)->get()->pluck('permission_slug')->toArray();
//    }
//
//    /**
//     * Replace all existing permissions with a new set of permissions.
//     *
//     * @param array $permissions
//     */
//    public function setPermissionsAttribute(array $permissions)
//    {
//        if (!$this->id) {
//            $this->save();
//        }
//
//        $this->revokeAll();
//
//        collect($permissions)->map(function ($permission) {
//            if (!\in_array($permission, Policy::all(), true)) {
//                return;
//            }
//
//            $this->grant($permission);
//        });
//    }
//}
