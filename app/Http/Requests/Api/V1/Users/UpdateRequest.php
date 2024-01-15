<?php

namespace App\Http\Requests\Api\V1\Users;

use App\Http\Requests\Api\V1\AbstractApiV1Request;

final class UpdateRequest extends AbstractApiV1Request
{
    final public function rules(): array
    {
        return [
            'name' => 'string|nullable',
            'email' => 'email|nullable',
            'password' => 'string|nullable',
        ];
    }
}
