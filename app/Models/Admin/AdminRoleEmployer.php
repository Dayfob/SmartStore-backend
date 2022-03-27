<?php

namespace App\Models\Admin;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\Admin\AdminRoleEmployer
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Admin\AdminRole|null $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read User|null $users
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRoleEmployer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRoleEmployer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRoleEmployer query()
 * @mixin \Eloquent
 */
class AdminRoleEmployer extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admin_role_employers';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'role_id',
        'employer_id'
    ];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AdminRole::class, 'role_id');
    }
}
