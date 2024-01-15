<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class DatabaseSeeder extends Seeder
{
    private array $seeders = [
        UserSeed::class,
        CategorySeeder::class,
        ProductSeeder::class,
        ProductCategorySeeder::class,
    ];

    public function run(): void
    {
        DB::beginTransaction();
        foreach ($this->seeders as $seeder) {
            if (class_exists($seeder) && ($seederObj = new $seeder) && ($seederObj instanceof Seeder)) {
                $seederObj->run();
            }
        }
        DB::commit();
    }
}
