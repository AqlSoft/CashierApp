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
        Schema::create('parties', function (Blueprint $table) {
          $table->id();
        $table->string('name');
        $table->string('phone', 20);
        $table->string('email', 191)->unique()->nullable();
        $table->text('address')->nullable();
        $table->enum('type', ['customer', 'supplier'])->default('customer');
        $table->unsignedBigInteger('created_by')->nullable(); // معرف المستخدم الذي أنشأ السجل
        $table->unsignedBigInteger('updated_by')->nullable(); // معرف المستخدم الذي قام بالتحديث
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parties');
    }
};
