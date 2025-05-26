<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * تشغيل الترحيل
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_group_mappings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tax_group_id')->constrained('tax_groups')->cascadeOnDelete();
            $table->foreignId('tax_id')->constrained('taxes')->cascadeOnDelete();
            $table->unsignedInteger('display_order')->default(0);
            $table->timestamps();

            // منع التكرار في العلاقة بين الضريبة والمجموعة
            $table->unique(['tax_group_id', 'tax_id']);
        });
    }

    /**
     * التراجع عن الترحيل
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_group_mappings');
    }
};
