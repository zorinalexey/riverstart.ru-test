<?php

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Requests\Api\V1\Products\CreateRequest;
use App\Http\Resources\Api\V1\Products\ProductResource;
use Illuminate\Http\JsonResponse;

final class CreateController extends AbstractProductsController
{
    public function __invoke(CreateRequest $request): JsonResponse
    {
        return $this->create($request, 'products', ProductResource::class);
    }
}
