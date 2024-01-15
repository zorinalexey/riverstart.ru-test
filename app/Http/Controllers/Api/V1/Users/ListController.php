<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Requests\Api\V1\Users\FilterRequest;
use Illuminate\Http\JsonResponse;

final class ListController extends AbstractUsersController
{
    public function __invoke(FilterRequest $request): JsonResponse
    {
        return $this->list($this->service, $request, 'users');
    }
}
