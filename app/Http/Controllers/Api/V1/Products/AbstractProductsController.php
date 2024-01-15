<?php

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Api\V1\AbstractApiV1Controller;
use App\Services\Products\ProductServiceInterface;

abstract class AbstractProductsController extends AbstractApiV1Controller
{
    final public function __construct(
        protected readonly ProductServiceInterface $service
    ) {
    }
}
