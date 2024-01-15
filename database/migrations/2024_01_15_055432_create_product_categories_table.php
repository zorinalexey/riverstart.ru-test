<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $table;

    public function __construct()
    {
        $this->table = (new ProductCategory())->getTable();
    }

    public function up(): void
    {
        Schema::create($this->table, static function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->comment('Id товара');
            $table->bigInteger('category_id')->comment('Id категории');
            $table->timestamps();

            $table->unique(['product_id', 'category_id']);
            $table->foreign('product_id')->on((new Product())->getTable())->references('id');
            $table->foreign('category_id')->on((new Category())->getTable())->references('id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
