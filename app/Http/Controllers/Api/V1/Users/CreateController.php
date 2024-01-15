<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Requests\Api\V1\Users\CreateRequest;
use Illuminate\Http\JsonResponse;

final class CreateController extends AbstractUsersController
{
    public function __invoke(CreateRequest $request): JsonResponse
    {
        return $this->create($this->service, $request, 'users');
    }
}
