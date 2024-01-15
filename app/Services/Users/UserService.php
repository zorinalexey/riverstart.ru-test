<?php

namespace App\Services\Users;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class UserService implements UserServiceInterface
{

    public function list(array $filterData): Collection|LengthAwarePaginator|null
    {
        // TODO: Implement list() method.
    }

    public function view(int|string $user): User|Model
    {
        // TODO: Implement view() method.
    }

    public function create(array $data): User|Model
    {
        // TODO: Implement create() method.
    }

    public function update(array $data, int|string $user): User|Model
    {
        // TODO: Implement update() method.
    }

    public function delete(int|string $user): bool
    {
        // TODO: Implement delete() method.
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
