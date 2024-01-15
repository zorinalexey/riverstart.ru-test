<?php

namespace App\Http\Requests\Api\V1\Users;

use App\Http\Requests\Api\V1\AbstractApiV1Request;

final class CreateRequest extends AbstractApiV1Request
{
    final public function rules(): array
    {
        return [
            'name' => 'string|required',
            'email' => 'email|required',
            'password' => 'string|required',
        ];
    }
}
