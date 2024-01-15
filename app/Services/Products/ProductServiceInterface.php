<?php

namespace App\Services\Products;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ProductServiceInterface
{
    public function list(array $filterData): Collection|LengthAwarePaginator|null;

    public function view(string|int $product): Product|Model;

    public function create(array $data): Product|Model;

    public function update(array $data, string|int $product): Product|Model;

    public function delete(string|int $product): bool;
}
