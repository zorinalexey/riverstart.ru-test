<?php

namespace App\Models;

use App\Utils\Filter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string|int $id
 * @property string $name
 * @property string $alias
 * @property string $description
 * @property string $updated_at
 * @property string $created_at
 * @property BelongsToMany $products
 *
 * @method static Builder products()
 * @method static Builder filter()
 */
final class Category extends Model
{
    use Filterable, HasFactory;

    protected $guarded = [];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, (new ProductCategory())->getTable(), 'category_id', 'product_id');
    }
}
