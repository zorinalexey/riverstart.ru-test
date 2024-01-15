<?php

namespace App\Http\Controllers\Api\V1\Categories;

use App\Http\Requests\Api\V1\Categories\UpdateRequest;
use Illuminate\Http\JsonResponse;

final class UpdateController extends AbstractCategoriesController
{
    public function __invoke(UpdateRequest $request, string|int $category): JsonResponse
    {
        return $this->update($request, $category, 'categories');
    }
}
