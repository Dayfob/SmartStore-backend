<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * App\Models\User\UserCart
 *
 * @property int $id
 * @property string $status
 * @property int $user_id
 * @property int $total_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\CartProduct[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\User\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserCart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCart query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCart whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCart whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCart whereUserId($value)
 * @mixin \Eloquent
 */
class UserCart extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user_cart';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'total_price',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CartProduct::class, 'cart_id', 'id');
    }
}
