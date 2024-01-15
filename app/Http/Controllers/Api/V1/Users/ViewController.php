<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Resources\Api\V1\Users\UserResource;
use Illuminate\Http\JsonResponse;

final class ViewController extends AbstractUsersController
{
    public function __invoke(string|int $user): JsonResponse
    {
        return $this->view($user, UserResource::class);
    }
}
