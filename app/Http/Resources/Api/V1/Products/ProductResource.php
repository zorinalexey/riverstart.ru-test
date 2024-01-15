<?php

namespace App\Http\Resources\Api\V1\Products;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var Product $this */
        $this->load(['categories']);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'alias' => $this->alias,
            'is_public' => $this->is_public,
            'price' => $this->price,
            'balance_in_stock' => $this->balance_in_stock,
            'categories' => ProductCategoryResource::collection($this->categories),
        ];
    }
}
