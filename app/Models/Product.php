<?php

namespace App\Models;

use App\Utils\Filter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int|string $id
 * @property string $name
 * @property string $alias
 * @property bool $is_public
 * @property float $price
 * @property int $balance_in_stock
 * @property string $updated_at
 * @property string $created_at
 * @property BelongsToMany $categories
 *
 * @method static Builder categories()
 */
final class Product extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $guarded = [];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, (new ProductCategory())->getTable(), 'product_id', 'category_id');
    }
}
