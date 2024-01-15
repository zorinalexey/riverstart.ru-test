<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Response\Api\V1\FailResponse;
use App\Http\Response\Api\V1\SuccessResponse;
use Illuminate\Http\JsonResponse;

final class LogoutController extends AbstractUsersController
{
    public function __invoke(): JsonResponse
    {
        if ($this->service->logOut()) {
            return new SuccessResponse(body: [
                'message' => trans('users.success.logout'),
            ]);
        }

        return new FailResponse('users.fail.logout');
    }
}
