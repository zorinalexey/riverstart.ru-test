<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

final class ProductCategoryFactory extends Factory
{
    public function definition(): array
    {
        try {
            return $this->getData();
        } catch (Exception $e) {
            return $this->definition();
        }
    }

    private function getData(): array
    {
        $productCategoriesIds = [];
        $categoryProductsIds = [];

        $productCategories = ProductCategory::query()->get();

        foreach ($productCategories as $productCategory) {
            $categoryProductsIds[] = $productCategory->category_id;
            $productCategoriesIds[] = $productCategory->product_id;
        }

        return [
            'product_id' => Product::query()->whereNotIn('id', $productCategoriesIds)->get()->random(null, 'id'),
            'category_id' => Category::query()->whereNotIn('id', $categoryProductsIds)->get()->random(null, 'id'),
        ];

    }
}
