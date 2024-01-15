<?php

namespace App\Http\Resources\Api\V1\Categories;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class CategoryProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var Product $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'is_public' => $this->is_public,
            'price' => $this->price,
            'balance_in_stock' => $this->balance_in_stock,
        ];
    }
}
