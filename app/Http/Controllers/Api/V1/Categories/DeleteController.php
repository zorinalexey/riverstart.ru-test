<?php

namespace App\Http\Controllers\Api\V1\Categories;

use App\Http\Resources\Api\V1\Categories\CategoryResource;
use Illuminate\Http\JsonResponse;

final class DeleteController extends AbstractCategoriesController
{
    public function __invoke(string|int $category): JsonResponse
    {
        return $this->delete($category, 'categories', CategoryResource::class);
    }
}
