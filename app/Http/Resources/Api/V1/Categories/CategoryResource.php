<?php

namespace App\Http\Resources\Api\V1\Categories;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class CategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var Category $this */
        $this->load(['products']);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'alias' => $this->alias,
            'description' => $this->description,
            'products' => CategoryProductResource::collection($this->products),
        ];
    }
}
