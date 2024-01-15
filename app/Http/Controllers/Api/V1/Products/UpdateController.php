<?php

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Requests\Api\V1\Products\UpdateRequest;
use Illuminate\Http\JsonResponse;

final class UpdateController extends AbstractProductsController
{
    public function __invoke(UpdateRequest $request, string|int $product): JsonResponse
    {
        return $this->update($request, $product, 'products');
    }
}
