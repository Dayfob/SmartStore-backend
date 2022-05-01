<?php

namespace App\Models\Product;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\Product\ProductSubcategory
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property array $attributes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product\ProductCategory|null $category
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product\Product[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereAttributes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $image_url
 * @method static \Illuminate\Database\Eloquent\Builder|ProductSubcategory whereImageUrl($value)
 */
class ProductSubcategory extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'product_category_subcategories';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'attributes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'attributes' => 'array',
    ];

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class, 'subcategory_id', 'id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
