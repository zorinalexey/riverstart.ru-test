<?php

namespace App\Http\Controllers\Api\V1\Categories;

use App\Http\Requests\Api\V1\Categories\FilterRequest;
use Illuminate\Http\JsonResponse;

final class ListController extends AbstractCategoriesController
{
    public function __invoke(FilterRequest $request): JsonResponse
    {
        return $this->list($request);
    }
}
