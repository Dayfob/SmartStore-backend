<?php

namespace App\Models\Admin;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Actions\Actionable;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Admin\Employer
 *
 * @property int $id
 * @property string|null $name
 * @property string $email
 * @property string|null $avatar
 * @property string|null $remember_token
 * @property int $is_active
 * @property int $is_telegram_enabled
 * @property string|null $telegram_id
 * @property string $password
 * @property string|null $phone_number
 * @property string|null $centrifugo_token
 * @property string|null $email_verified_at
 * @property string|null $phone_number_verified_at
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Nova\Actions\ActionEvent[] $actions
 * @property-read int|null $actions_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\App\Models\Admin\EmployerNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pktharindu\NovaPermissions\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Employer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereIsTelegramEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer wherePhoneNumberVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereTelegramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer withRoles()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Message[] $messages
 * @property-read int|null $messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|News[] $news
 * @property-read int|null $news_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Employer permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer role($roles, $guard = null)
 */
class Employer extends Authenticatable implements CanResetPasswordContract
{
    use Actionable, Notifiable, CanResetPassword, HasRoles;

    protected $table = 'admin_employers';

    protected $fillable = [
        'name',
        'avatar',
        'email',
        'phone_number',
        'password',
        'is_enabled',
        'telegram_id',
        'is_telegram_enabled',
    ];

    public function avatar(): string
    {
        return $this->avatar ? Storage::disk('minio')->url($this->avatar) : "/images/avatar.png";
    }

    public function isAdmin(): bool
    {
        return $this->roles->contains('slug', 'admin');
    }

    public function news(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(News::class, 'user_id', 'id');
    }
}
