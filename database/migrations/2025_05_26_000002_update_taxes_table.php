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
        Schema::table('taxes', function (Blueprint $table) {
            // إضافة الحقول الجديدة
            $table->string('tax_code', 20)->unique()->after('id');
            $table->string('tax_name_ar', 100)->after('tax_code');
            $table->string('tax_name_en', 100)->after('tax_name_ar');
            $table->decimal('tax_rate', 10, 4)->default(0)->after('tax_name_en');
            $table->enum('tax_type', ['PERCENTAGE', 'FIXED_AMOUNT'])->default('PERCENTAGE')->after('tax_rate');
            $table->boolean('is_active')->default(true)->after('tax_type');
            $table->boolean('is_default')->default(false)->after('is_active');
            $table->boolean('is_inclusive')->default(false)->after('is_default');
            $table->date('effective_from')->nullable()->after('is_inclusive');
            $table->date('effective_to')->nullable()->after('effective_from');
            $table->string('gl_account_code', 50)->nullable()->after('effective_to');
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->softDeletes();
        });
    }

    /**
     * التراجع عن الترحيل
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taxes', function (Blueprint $table) {
            $table->dropColumn([
                'tax_code',
                'tax_name_ar',
                'tax_name_en',
                'tax_rate',
                'tax_type',
                'is_active',
                'is_default',
                'is_inclusive',
                'effective_from',
                'effective_to',
                'gl_account_code',
                'created_by',
                'updated_by',
                'deleted_at'
            ]);
        });
    }
};
