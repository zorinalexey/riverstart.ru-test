<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

final class ProductFactory extends Factory
{
    private static array|null $crud_config = null;

    public function __construct()
    {
        parent::__construct();

        if(!self::$crud_config){
            self::$crud_config = config('crud-service');
        }
    }
    public function definition(): array
    {
        $name = fake()->text(30);

        return [
            'name' => $name,
            'alias' => Str::slug($name, self::$crud_config['alias_separator']),
            'is_public' => (bool) rand(0, 1),
            'price' => fake()->randomFloat(),
            'balance_in_stock' => fake()->numberBetween(),
        ];
    }
}
