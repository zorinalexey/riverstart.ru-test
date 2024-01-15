<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Requests\Api\V1\Users\LoginRequest;
use Illuminate\Http\JsonResponse;

final class LoginController extends AbstractUsersController
{
    public function __invoke(LoginRequest $request): JsonResponse
    {

    }
}
