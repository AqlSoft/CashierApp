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
        Schema::create('invoice_items', function (Blueprint $table) {
          $table->id(); // المعرف الفريد للصنف
          $table->unsignedBigInteger('product_id'); // معرف المنتج
          $table->unsignedBigInteger('invoice_id'); // معرف الفاتورة
          $table->unsignedBigInteger('quantity'); // الكمية
          $table->unsignedBigInteger('unit_id'); // معرف الوحدة
          $table->decimal('price', 10, 2); // السعر
          $table->timestamps(); // تاريخ الإنشاء والتحديث
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
