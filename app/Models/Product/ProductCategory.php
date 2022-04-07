<?php

namespace App\Models\Product;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\Product\ProductCategory
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product\Product[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product\ProductSubcategory[] $subcategories
 * @property-read int|null $subcategories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory query()
 * @mixin \Eloquent
 */
class ProductCategory extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'product_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function subcategories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductSubcategory::class, 'category_id', 'id');
    }
}
