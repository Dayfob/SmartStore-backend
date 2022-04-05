<?php

namespace App\Models\User;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * App\Models\User\CartProduct
 *
 * @property int $id
 * @property int $cart_id
 * @property int $item_id
 * @property int $item_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User\Cart|null $cart
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Product|null $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereItemAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CartProduct extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user_cart_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'cart_id',
        'item_id',
        'item_amount',
    ];

    public function cart(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class, 'item_id');
    }
}
