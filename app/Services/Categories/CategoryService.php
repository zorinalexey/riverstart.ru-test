<?php

namespace App\Services\Categories;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class CategoryService implements CategoryServiceInterface
{
    public function list(array $filterData): Collection|LengthAwarePaginator|null
    {
        // TODO: Implement list() method.
    }

    public function view(int|string $category): Category|Model
    {
        // TODO: Implement view() method.
    }

    public function create(array $data): Category|Model
    {
        // TODO: Implement create() method.
    }

    public function update(array $data, int|string $category): Category|Model
    {
        // TODO: Implement update() method.
    }

    public function delete(int|string $category): bool
    {
        // TODO: Implement delete() method.
    }
}
