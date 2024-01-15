<?php

namespace App\Services\Products;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class ProductService implements ProductServiceInterface
{
    public function list(array $filterData): Collection|LengthAwarePaginator|null
    {
        // TODO: Implement list() method.
    }

    public function view(int|string $product): Product|Model
    {
        // TODO: Implement view() method.
    }

    public function create(array $data): Product|Model
    {
        // TODO: Implement create() method.
    }

    public function update(array $data, int|string $product): Product|Model
    {
        // TODO: Implement update() method.
    }

    public function delete(int|string $product): bool
    {
        // TODO: Implement delete() method.
    }
}
