<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('order_products', function (Blueprint $table) {
        $table->id(); // PK
        // Foreign Key ke orders [cite: 100]
        $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
        // Foreign Key ke products [cite: 101]
        $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
        $table->integer('jumlah'); // [cite: 102]
        $table->decimal('harga_satuan', 10, 2); // [cite: 103]
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
