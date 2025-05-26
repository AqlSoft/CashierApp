<?php

namespace Database\Seeders;

use App\Models\Tax;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxSeeder extends Seeder
{
    /**
     * تشغيل البذور
     *
     * @return void
     */
    public function run()
    {
        // تعطيل فحص المفاتيح الأجنبية مؤقتًا
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // حذف البيانات الموجودة
        Tax::truncate();
        
        // إعادة تفعيل فحص المفاتيح الأجنبية
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // إنشاء ضرائب افتراضية
        $taxes = [
            [
                'tax_code' => 'VAT-15',
                'tax_name_ar' => 'ضريبة القيمة المضافة 15%',
                'tax_name_en' => 'VAT 15%',
                'tax_rate' => 15.0,
                'is_active' => true,
                'is_default' => true,
                'description' => 'ضريبة القيمة المضافة الأساسية بنسبة 15%',
            ],
            [
                'tax_code' => 'VAT-5',
                'tax_name_ar' => 'ضريبة القيمة المضافة 5%',
                'tax_name_en' => 'VAT 5%',
                'tax_rate' => 5.0,
                'is_active' => true,
                'is_default' => false,
                'description' => 'ضريبة القيمة المضافة المخفضة بنسبة 5%',
            ],
            [
                'tax_code' => 'ZERO-RATE',
                'tax_name_ar' => 'ضريبة صفر%',
                'tax_name_en' => 'Zero Rate',
                'tax_rate' => 0.0,
                'is_active' => true,
                'is_default' => false,
                'description' => 'ضريبة صفر بالمئة للسلع المعفاة',
            ],
            [
                'tax_code' => 'EXEMPT',
                'tax_name_ar' => 'معفاة من الضريبة',
                'tax_name_en' => 'Tax Exempt',
                'tax_rate' => 0.0,
                'is_active' => true,
                'is_default' => false,
                'description' => 'سلع معفاة من الضرائب',
            ],
        ];

        // إدراج الضرائب الافتراضية
        foreach ($taxes as $taxData) {
            Tax::create($taxData);
        }

        // إنشاء ضرائب عشوائية لأغراض الاختبار
        if (app()->environment('local', 'testing')) {
            $this->createTestTaxes();
        }
    }

    /**
     * إنشاء ضرائب عشوائية لأغراض الاختبار
     *
     * @return void
     */
    protected function createTestTaxes()
    {
        // إنشاء 10 ضرائب عشوائية
        \App\Models\Tax::factory()
            ->count(10)
            ->create();
    }
}
