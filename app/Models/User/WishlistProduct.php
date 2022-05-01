<?php

namespace App\Models\User;

use App\Models\Product\Product;
use App\Models\Product\ProductSubcategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * App\Models\User\WishlistProduct
 *
 * @property int $id
 * @property int $wishlist_id
 * @property int $item_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\User\Wishlist|null $order
 * @property-read Product|null $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|WishlistProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WishlistProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WishlistProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|WishlistProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WishlistProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WishlistProduct whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WishlistProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WishlistProduct whereWishlistId($value)
 * @mixin \Eloquent
 * @property-read Product|null $product
 */
class WishlistProduct extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user_wishlist_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'wishlist_id',
        'item_id',
    ];

    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Wishlist::class, 'wishlist_id');
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class, 'item_id');
    }
}
