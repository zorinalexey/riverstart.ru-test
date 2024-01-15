<?php

namespace App\Http\Controllers\Api\V1\Users;

use App\Http\Controllers\Api\V1\AbstractApiV1Controller;
use App\Services\Users\UserServiceInterface;

abstract class AbstractUsersController extends AbstractApiV1Controller
{
    final public function __construct(
        protected readonly UserServiceInterface $service
    ) {

    }
}
