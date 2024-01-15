<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

final class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->text(30);

        return [
            'name' => $name,
            'alias' => Str::slug($name, config('crud-service')['alias_separator']),
            'is_public' => (bool) rand(0, 1),
            'price' => fake()->randomFloat(),
            'balance_in_stock' => fake()->numberBetween(),
        ];
    }
}
