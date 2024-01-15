<?php

namespace App\Http\Requests\Api\V1\Users;

use App\Http\Requests\Api\V1\AbstractApiV1Request;

final class LoginRequest extends AbstractApiV1Request
{
    final public function rules(): array
    {
        return [
            'email' => 'email|required',
            'password' => 'string|required',
        ];
    }
}
