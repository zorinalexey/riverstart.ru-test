<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

final class UserSeed extends Seeder
{
    public function run(): void
    {
        User::factory(50)->create();
    }
}
