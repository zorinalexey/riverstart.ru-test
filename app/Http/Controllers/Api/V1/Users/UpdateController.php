<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Requests\Api\V1\Users\UpdateRequest;
use Illuminate\Http\JsonResponse;

final class UpdateController extends AbstractUsersController
{
    public function __invoke(UpdateRequest $request, string|int $user): JsonResponse
    {
        return $this->update($this->service, $request, $user, 'users');
    }
}
