<?php

namespace App\Http\Response\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

final class SuccessResponse extends JsonResponse
{
    public function __construct(array $body, $headers = [])
    {
        parent::__construct(
            data: [
                'body' => Arr::pull($body, 'data', []),
                'message' => Arr::pull($body, 'message', 'Ok'),
                'success' => true,
                'error' => 0,
                ...$body,
            ],
            headers: $headers,
        );
    }
}
