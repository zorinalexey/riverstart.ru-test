<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string|int $id
 * @property string|int $product_id
 * @property string|int $category_id
 * @property string $updated_at
 * @property string $created_at
 * @property HasOne $product
 * @property HasOne $category
 * @property HasMany $productCategories
 * @property HasMany $categoryProducts
 *
 * @method static Builder product()
 * @method static Builder category()
 * @method static Builder productCategories()
 * @method static Builder categoryProducts()
 */
final class ProductCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function categoryProducts(): HasMany
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }

    public function productCategories(): HasMany
    {
        return $this->hasMany(Category::class, 'id', 'category_id');
    }
}
