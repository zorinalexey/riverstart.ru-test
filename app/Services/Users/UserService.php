<?php

namespace App\Services\Users;

use App\Exceptions\UserException;
use App\Filters\UserFilter;
use App\Models\User;
use App\Services\CRUD\CRUDService;
use App\Utils\Traits\Aliasable;
use Illuminate\Database\Eloquent\Model;

final class UserService extends CRUDService implements UserServiceInterface
{
    use Aliasable;

    protected static string $model = User::class;

    protected string $cacheKey;

    protected static string $filter = UserFilter::class;

    protected static string $exception = UserException::class;

    public function __construct()
    {
        parent::__construct();
        $this->cacheKey = (new User())->getTable();
    }

    public function login(array $data): User|Model
    {
        // TODO: Implement login() method.
    }

    public function logOut(): void
    {
        // TODO: Implement logOut() method.
    }
}
