<?php

namespace App\Http\Requests\Api\V1\Categories;

use App\Http\Requests\Api\V1\AbstractApiV1Request;

final class UpdateRequest extends AbstractApiV1Request
{
    final public function rules(): array
    {
        return [
            'name' => 'string|max:250|nullable',
            'description' => 'string|nullable',
        ];
    }
}
