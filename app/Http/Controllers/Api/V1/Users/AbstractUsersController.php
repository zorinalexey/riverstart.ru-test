<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Api\V1\AbstractApiV1Controller;
use App\Http\Resources\Api\V1\Users\UserResource;
use App\Services\Users\UserServiceInterface;

abstract class AbstractUsersController extends AbstractApiV1Controller
{
    protected readonly string $resource;

    final public function __construct(
        protected readonly UserServiceInterface $service
    ) {
        $this->resource = UserResource::class;
    }
}
