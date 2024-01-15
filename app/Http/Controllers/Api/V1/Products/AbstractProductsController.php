<?php

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Api\V1\AbstractApiV1Controller;
use App\Http\Resources\Api\V1\Products\ProductResource;
use App\Services\Products\ProductServiceInterface;

abstract class AbstractProductsController extends AbstractApiV1Controller
{
    protected readonly string $resource;

    final public function __construct(
        protected readonly ProductServiceInterface $service
    ) {
        $this->resource = ProductResource::class;
    }
}
