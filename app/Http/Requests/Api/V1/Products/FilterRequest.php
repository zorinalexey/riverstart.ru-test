<?php

namespace App\Http\Requests\Api\V1\Products;

use App\Http\Requests\Api\V1\AbstractApiV1Request;

final class FilterRequest extends AbstractApiV1Request
{
    final public function rules(): array
    {
        return [
            'sort' => 'array|nullable',
            'name' => 'string|nullable',
            'price_min' => 'numeric|nullable',
            'price_max' => 'numeric|nullable',
            'is_public' => 'bool|nullable',
            'category' => 'int|nullable',
            'sort.id' => 'string|nullable',
            'sort.name' => 'string|nullable',
            'sort.price' => 'string|nullable',
            'sort.balance_in_stock' => 'string|nullable',
            'trashed' => 'string|nullable',
        ];
    }
}
