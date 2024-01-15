<?php

namespace App\Http\Requests\Api\V1\Products;

use App\Http\Requests\Api\V1\AbstractApiV1Request;

final class CreateRequest extends AbstractApiV1Request
{
    final public function rules(): array
    {
        return [
            'name' => 'string|max:255|required',
            'is_public' => 'bool|nullable',
            'price' => 'numeric|required',
            'balance_in_stock' => 'integer|required',
            'categories' => 'array|required',
            'categories.*' => 'integer|required',
        ];
    }
}
