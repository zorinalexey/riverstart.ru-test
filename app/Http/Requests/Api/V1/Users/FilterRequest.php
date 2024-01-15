<?php

namespace App\Http\Requests\Api\V1\Users;

use App\Http\Requests\Api\V1\AbstractApiV1Request;

final class FilterRequest extends AbstractApiV1Request
{
    final public function rules(): array
    {
        return [
            'sort' => 'array|nullable',
            'name' => 'string|nullable',
        ];
    }
}
