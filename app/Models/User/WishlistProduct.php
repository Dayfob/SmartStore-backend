<?php

namespace App\Models\User;

use App\Models\Product\Product;
use App\Models\Product\ProductSubcategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


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
        return $this->belongsTo(UserWishlist::class, 'wishlist_id');
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class, 'item_id');
    }
}
