<?php

namespace App\Http\Controllers\Api\V1\Users;

use Illuminate\Http\JsonResponse;

final class DeleteController extends AbstractUsersController
{
    public function __invoke(string|int $user): JsonResponse
    {
        return $this->delete($user, 'users');
    }
}
