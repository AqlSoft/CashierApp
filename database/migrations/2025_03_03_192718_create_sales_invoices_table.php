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
        Schema::create('sales_invoices', function (Blueprint $table) {
          $table->id(); // المعرف الفريد للفاتورة
          $table->unsignedBigInteger('client_id'); // معرف العميل
          $table->string('vat_number', 50)->nullable(); // الرقم الضريبي للعميل
          $table->decimal('invoice_total', 10, 2); // إجمالي الفاتورة شامل الضريبة
          $table->decimal('vat_amount', 10, 2); // قيمة الضريبة
          $table->date('due_date'); // تاريخ الاستحقاق
          $table->date('payment_day')->nullable(); // تاريخ السداد
          $table->unsignedBigInteger('order_id'); // معرف الطلب المرتبط
          $table->decimal('total_amount', 10, 2); // إجمالي المبلغ
          $table->decimal('amount', 10, 2); // المبلغ المدفوع
          $table->dateTime('date'); // تاريخ إصدار الفاتورة
          $table->tinyInteger('status')->default(0); // حالة الفاتورة (0 = غير مدفوعة، 1 = مدفوعة)
          $table->enum('type', ['sales', 'sales_inverse', 'purchases', 'purchases_inverse']); // نوع الفاتورة
          $table->timestamps(); // تاريخ الإنشاء والتحديث
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_invoices');
    }
};
