<?php

namespace App\Services\Products;

use App\Models\Product;
use App\Services\CRUDServiceInterface;
use Illuminate\Database\Eloquent\Model;

interface ProductServiceInterface extends CRUDServiceInterface
{
    public function view(string|int $product): Product|Model;

    public function create(array $data): Product|Model;

    public function update(array $data, string|int $product): Product|Model;

    public function delete(string|int $product): bool;
}
