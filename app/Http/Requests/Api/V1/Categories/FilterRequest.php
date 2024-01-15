<?php

namespace App\Http\Requests\Api\V1\Categories;

use App\Http\Requests\Api\V1\AbstractApiV1Request;

final class FilterRequest extends AbstractApiV1Request
{
    final public function rules(): array
    {
        return [
            'name' => 'string|nullable',
            'description' => 'string|nullable',
            'sort' => 'array|nullable',
            'sort.id' => 'string|nullable',
            'sort.name' => 'string|nullable',
            'sort.description' => 'string|nullable',
        ];
    }
}
