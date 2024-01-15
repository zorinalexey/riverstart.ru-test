<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

final class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->text(20);

        return [
            'name' => $name,
            'alias' => Str::slug($name, config('crud-service')['alias_separator']),
            'description' => fake()->realText,
        ];
    }
}
