<?php

namespace App\Http\Controllers\Api\V1\Categories;

use App\Http\Requests\Api\V1\Categories\UpdateRequest;
use App\Http\Resources\Api\V1\Categories\CategoryResource;
use Illuminate\Http\JsonResponse;

final class UpdateController extends AbstractCategoriesController
{
    public function __invoke(UpdateRequest $request, string|int $category): JsonResponse
    {
        return $this->update($request, $category, 'categories', CategoryResource::class);
    }
}
