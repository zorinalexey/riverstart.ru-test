<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CRUDServiceInterface
{

    public function list(array $filterData): Collection|LengthAwarePaginator|null;

    public function view(string|int $model): Model;

    public function create(array $data): Model;

    public function update(array $data, string|int $model): Model;

    public function delete(string|int $model): bool;
}
