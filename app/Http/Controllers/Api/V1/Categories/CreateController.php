<?php

namespace App\Http\Controllers\Api\V1\Categories;

use App\Http\Requests\Api\V1\Categories\CreateRequest;
use Illuminate\Http\JsonResponse;

final class CreateController extends AbstractCategoriesController
{
    public function __invoke(CreateRequest $request): JsonResponse
    {
        return $this->create($request, 'categories');
    }
}
