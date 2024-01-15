<?php

namespace App\Http\Response\Api\V1;

use Illuminate\Http\JsonResponse;

final class FailResponse extends JsonResponse
{
    public function __construct(string|array $message, int $code = 500, $headers = [])
    {
        parent::__construct(
            data: [
                'body' => [],
                'message' => $message,
                'success' => false,
                'error' => $code,
            ],
            headers: $headers,
        );
    }
}
