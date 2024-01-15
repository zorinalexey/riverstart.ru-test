<?php

namespace App\Services\Categories;

use App\Exceptions\CategoryException;
use App\Filters\CategoryFilter;
use App\Models\Category;
use App\Services\CRUD\CRUDService;
use App\Utils\Traits\Aliasable;

final class CategoryService extends CRUDService implements CategoryServiceInterface
{
    use Aliasable;

    protected static string $model = Category::class;

    protected string $cacheKey;

    protected static string $filter = CategoryFilter::class;

    protected static string $exception = CategoryException::class;

    protected static string $langPathName = 'categories';

    public function __construct()
    {
        parent::__construct();
        $this->cacheKey = (new Category())->getTable();
    }
}
