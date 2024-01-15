<?php

namespace App\Services\Products;

use App\Exceptions\ProductException;
use App\Filters\CategoryFilter;
use App\Models\Product;
use App\Services\CRUD\CRUDService;
use App\Utils\Traits\Aliasable;
use Illuminate\Database\Eloquent\Model;

final class ProductService extends CRUDService implements ProductServiceInterface
{
    use Aliasable;

    protected static string $model = Product::class;

    protected static string $filter = CategoryFilter::class;

    protected static string $exception = ProductException::class;

    protected string $cacheKey;

    public function __construct()
    {
        parent::__construct();
        $this->cacheKey = (new Product())->getTable();
    }

    public function create(array $data): Product|Model
    {
        // TODO: Implement create() method.
    }

    public function update(array $data, int|string $product): Product|Model
    {
        // TODO: Implement update() method.
    }
}
