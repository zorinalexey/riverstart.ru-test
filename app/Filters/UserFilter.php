<?php

namespace App\Filters;

use App\Utils\Filter\AbstractFilter;
use App\Utils\Traits\Sortable;
use Illuminate\Database\Query\Builder;

final class UserFilter extends AbstractFilter
{
    use Sortable;

    public const NAME = 'name';

    public function __construct(array $queryParams)
    {
        if (!in_array('sort', $queryParams, true)) {
            $queryParams['sort']['id'] = 'desc';
        }

        parent::__construct($queryParams);
    }
    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::SORT => [$this, 'sort'],
        ];
    }

    public function name(Builder $builder, string $value): void
    {
        $builder->where('name', 'LIKE', "%{$value}%");
    }
}
