<?php

namespace App\Http\Controllers\Api\V1\Products;

use Illuminate\Http\JsonResponse;

final class ViewController extends AbstractProductsController
{
    public function __invoke(string|int $product): JsonResponse
    {
        return $this->view($product);
    }
}
