<?php

namespace App\Filters;

use App\Models\ProductCategory;
use App\Utils\Filter\AbstractFilter;
use App\Utils\Traits\Sortable;
use Illuminate\Database\Query\Builder;

final class ProductFilter extends AbstractFilter
{
    use Sortable;

    public const NAME = 'name';

    public const TRASHED = 'trashed';

    public const PRICE_MIN = 'price_min';

    public const PRICE_MAX = 'price_max';

    public const IS_PUBLIC = 'is_public';

    public const CATEGORY = 'category';

    public function __construct(array $queryParams)
    {
        if (!in_array('sort', $queryParams, true)) {
            $queryParams['sort']['id'] = 'desc';
        }

        parent::__construct($queryParams);
    }

    public function name(Builder $builder, string $value): void
    {
        $builder->where('name', 'LIKE', "%{$value}%");
    }

    public function priceMin(Builder $builder, int $value): void
    {
        $builder->where('price', '>=', $value);
    }

    public function priceMax(Builder $builder, int $value): void
    {
        $builder->where('price', '<=', $value);
    }

    public function isPublic(Builder $builder, bool $value): void
    {
        $builder->where('is_public', $value);
    }

    public function category(Builder $builder, int $value): void
    {
        $productIds = [];

        ProductCategory::query()->where('category_id', $value)->get()
            ->each(
                static function ($productCategory) use (&$productIds) {
                    $productIds[] = $productCategory->product_id;
                }
            );

        $builder->whereIn('id', $productIds);
    }

    public function trashed(Builder $builder, string $value): void
    {
        $value = mb_strtolower($value);

        if ($value === 'all') {
            $builder->withTrashed();
        }

        if ($value === 'only') {
            $builder->onlyTrashed();
        }
    }

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::TRASHED => [$this, 'trashed'],
            self::PRICE_MIN => [$this, 'priceMin'],
            self::PRICE_MAX => [$this, 'priceMax'],
            self::IS_PUBLIC => [$this, 'isPublic'],
            self::CATEGORY => [$this, 'category'],
            self::SORT => [$this, 'sort'],
        ];
    }
}
