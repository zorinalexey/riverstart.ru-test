<?php

namespace App\Http\Controllers\Api\V1\Categories;

use App\Http\Controllers\Api\V1\AbstractApiV1Controller;
use App\Http\Resources\Api\V1\Categories\CategoryResource;
use App\Services\Categories\CategoryServiceInterface;

abstract class AbstractCategoriesController extends AbstractApiV1Controller
{
    protected readonly string $resource;

    final public function __construct(
        protected readonly CategoryServiceInterface $service
    ) {
        $this->resource = CategoryResource::class;
    }
}
