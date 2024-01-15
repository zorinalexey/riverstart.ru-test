<?php

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Requests\Api\V1\Products\FilterRequest;
use Illuminate\Http\JsonResponse;

final class ListController extends AbstractProductsController
{
    public function __invoke(FilterRequest $request): JsonResponse
    {
        return $this->list($this->service, $request, 'products');
    }
}
