<?php

namespace App\Services\Users;

use App\Exceptions\UserException;
use App\Filters\UserFilter;
use App\Models\User;
use App\Services\CRUD\CRUDService;
use App\Utils\Traits\Aliasable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

final class UserService extends CRUDService implements UserServiceInterface
{
    use Aliasable;

    protected static string $model = User::class;

    protected string $cacheKey;

    protected static string $filter = UserFilter::class;

    protected static string $exception = UserException::class;

    protected static string $langPathName = 'users';

    public function __construct()
    {
        parent::__construct();
        $this->cacheKey = (new User())->getTable();
    }

    public function login(array $data): User|Model
    {
        if (Auth::attempt($data)) {
            request()->session()->regenerate();

            return Auth::user();
        }

        throw new self::$exception(trans('users.auth.error'));
    }

    public function logOut(): bool
    {
        Auth::logout();

        if (! Auth::check()) {
            return true;
        }

        return false;
    }

    public function create(array $data): User|Model
    {
        $data['password'] = Hash::make($data['password']);

        return parent::create($data);
    }
}
