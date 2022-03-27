<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User\UserImage
 *
 * @property int $id
 * @property int $user_id
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\User\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserImage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserImage whereUserId($value)
 * @mixin \Eloquent
 */
class UserImage extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'image',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
