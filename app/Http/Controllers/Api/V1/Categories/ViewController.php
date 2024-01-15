<?php

namespace App\Http\Controllers\Api\V1\Categories;

use Illuminate\Http\JsonResponse;

final class ViewController extends AbstractCategoriesController
{
    public function __invoke(string|int $category): JsonResponse
    {
        return $this->view($category);
    }
}
