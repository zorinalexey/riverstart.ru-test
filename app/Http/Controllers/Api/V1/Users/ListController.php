<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Requests\Api\V1\Users\FilterRequest;
use App\Http\Resources\Api\V1\Users\UserResource;
use Illuminate\Http\JsonResponse;

final class ListController extends AbstractUsersController
{
    public function __invoke(FilterRequest $request): JsonResponse
    {
        return $this->list($request, UserResource::class);
    }
}
