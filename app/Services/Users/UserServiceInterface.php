<?php

namespace App\Services\Users;

use App\Models\User;
use App\Services\CRUDServiceInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface UserServiceInterface extends CRUDServiceInterface
{
    public function view(string|int $user): User|Model;

    public function create(array $data): User|Model;

    public function update(array $data, string|int $user): User|Model;

    public function delete(string|int $user): bool;

    public function login(array $data): User|Model;

    public function logOut(): void;
}
