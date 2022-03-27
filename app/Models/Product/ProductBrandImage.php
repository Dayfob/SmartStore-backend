<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\Product\ProductBrandImage
 *
 * @property int $id
 * @property int $brand_id
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product\Product|null $brand
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductBrandImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductBrandImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductBrandImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductBrandImage whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductBrandImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductBrandImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductBrandImage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductBrandImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductBrandImage extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'product_brand_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'brand_id',
        'image',
    ];

    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class, 'brand_id');
    }
}
