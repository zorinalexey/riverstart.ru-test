<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Requests\Api\V1\Users\CreateRequest;
use App\Http\Resources\Api\V1\Users\UserResource;
use Illuminate\Http\JsonResponse;

final class CreateController extends AbstractUsersController
{
    public function __invoke(CreateRequest $request): JsonResponse
    {
        return $this->create($request, 'users', UserResource::class);
    }
}
