<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $table;

    public function __construct()
    {
        $this->table = (new Product())->getTable();
    }

    public function up(): void
    {
        Schema::create($this->table, static function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique()->comment('Наименование товара');
            $table->string('alias', 255)->unique()->comment('Алиас товара');
            $table->boolean('is_public')->default(true)->comment('Публикация товара на ветрине');
            $table->float('price')->comment('Стоимость за единицу товара');
            $table->integer('balance_in_stock')->default(0)->comment('Остаток на складе');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
