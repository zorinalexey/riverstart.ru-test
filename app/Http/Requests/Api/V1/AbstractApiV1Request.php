<?php

namespace App\Http\Requests\Api\V1;

use App\Http\Requests\Api\AbstractApiRequest;

abstract class AbstractApiV1Request extends AbstractApiRequest
{
    final public function authorize(): bool
    {
        return true;
    }
}
