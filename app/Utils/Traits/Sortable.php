<?php

namespace App\Utils\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Sortable
{
    public const SORT = 'sort';

    final public function sort(Builder $builder, array $sorts): void
    {
        foreach ($sorts as $key => $value) {
            $builder->orderBy($key, $this->getSortType($value));
        }
    }

    private function getSortType(string $value): string
    {
        $value = mb_strtoupper($value);

        if ($value === 'ASC') {
            return $value;
        }

        return 'DESC';
    }
}
