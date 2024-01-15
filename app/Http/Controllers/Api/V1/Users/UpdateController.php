<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Requests\Api\V1\Users\UpdateRequest;
use App\Http\Resources\Api\V1\Users\UserResource;
use Illuminate\Http\JsonResponse;

final class UpdateController extends AbstractUsersController
{
    public function __invoke(UpdateRequest $request, string|int $user): JsonResponse
    {
        return $this->update($request, $user, 'users', UserResource::class);
    }
}
