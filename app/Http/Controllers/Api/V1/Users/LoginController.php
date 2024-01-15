<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Requests\Api\V1\Users\LoginRequest;
use App\Http\Resources\Api\V1\Users\AuthUserResource;
use App\Http\Response\Api\V1\FailResponse;
use App\Http\Response\Api\V1\SuccessResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

final class LoginController extends AbstractUsersController
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        try {
            $user = $this->service->login($request->validated());

            return new SuccessResponse(body: [
                'data' => AuthUserResource::make($user),
            ]);

        } catch (Exception $exception) {
            Log::error($exception->getMessage(), (array) $exception);

            return new FailResponse($exception->getMessage(), $exception->getCode());
        }
    }
}
