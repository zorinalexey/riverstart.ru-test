<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    private array $seeders = [
        CategorySeeder::class,
        ProductSeeder::class,
        ProductCategorySeeder::class,
    ];

    public function run(): void
    {
        foreach ($this->seeders as $seeder) {
            if (class_exists($seeder) && ($seederObj = new $seeder) && ($seederObj instanceof Seeder)) {
                $seederObj->run();
            }
        }
    }
}
