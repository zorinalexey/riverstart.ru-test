<?php

namespace App\Services\Categories;

use App\Models\Category;
use App\Services\CRUD\CRUDServiceInterface;
use Illuminate\Database\Eloquent\Model;

interface CategoryServiceInterface extends CRUDServiceInterface
{
    public function view(string|int $category): Category|Model;

    public function create(array $data): Category|Model;

    public function update(array $data, string|int $category): Category|Model;

    public function delete(string|int $category): bool;
}
