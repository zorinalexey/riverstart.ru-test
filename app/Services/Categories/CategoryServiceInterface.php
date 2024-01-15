<?php

namespace App\Services\Categories;

use App\Models\Category;
use App\Services\CRUDServiceInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CategoryServiceInterface extends CRUDServiceInterface
{
    public function view(string|int $category): Category|Model;

    public function create(array $data): Category|Model;

    public function update(array $data, string|int $category): Category|Model;

    public function delete(string|int $category): bool;
}
