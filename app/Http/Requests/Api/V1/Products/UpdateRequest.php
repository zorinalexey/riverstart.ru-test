<?php

namespace App\Http\Requests\Api\V1\Products;

use App\Http\Requests\Api\V1\AbstractApiV1Request;

final class UpdateRequest extends AbstractApiV1Request
{
    final public function rules(): array
    {
        return [
            'name' => 'string|max:255|nullable',
            'is_public' => 'bool|nullable',
            'price' => 'numeric|nullable',
            'balance_in_stock' => 'integer|nullable',
            'categories' => 'array|required',
            'categories.*' => 'integer|required',
        ];
    }
}
