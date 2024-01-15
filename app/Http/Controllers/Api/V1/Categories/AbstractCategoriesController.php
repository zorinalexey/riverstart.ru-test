<?php

namespace App\Http\Controllers\Api\V1\Categories;

use App\Http\Controllers\Api\V1\AbstractApiV1Controller;
use App\Services\Categories\CategoryServiceInterface;

abstract class AbstractCategoriesController extends AbstractApiV1Controller
{
    final public function __construct(
        protected readonly CategoryServiceInterface $service
    )
    {

    }
}
