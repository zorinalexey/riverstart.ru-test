<?php

namespace App\Filters;

use App\Utils\Filter\AbstractFilter;
use App\Utils\Traits\Sortable;
use Illuminate\Database\Eloquent\Builder;

final class CategoryFilter extends AbstractFilter
{
    use Sortable;

    public function __construct(array $queryParams)
    {
        if (! in_array('sort', $queryParams, true)) {
            $queryParams['sort']['id'] = 'desc';
        }

        parent::__construct($queryParams);
    }

    public const NAME = 'name';

    public const DESCRIPTION = 'description';

    public function name(Builder $builder, string $value): void
    {
        $builder->where('name', 'LIKE', "%{$value}%");
    }

    public function description(Builder $builder, string $value): void
    {
        $builder->where('description', 'LIKE', "%{$value}%");
    }

    protected function getCallbacks(): array
    {
        return [
            self::SORT => [$this, 'sort'],
            self::NAME => [$this, 'name'],
            self::DESCRIPTION => [$this, 'description'],
        ];
    }
}
