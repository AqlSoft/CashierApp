<?php

namespace Database\Seeders;

use App\Models\Tax;
use App\Models\TaxGroup;
use App\Models\TaxGroupMapping;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxGroupSeeder extends Seeder
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
        TaxGroupMapping::truncate();
        TaxGroup::truncate();
        
        // إعادة تفعيل فحص المفاتيح الأجنبية
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // إنشاء مجموعات ضريبية افتراضية
        $taxGroups = [
            [
                'group_code' => 'VAT-GRP',
                'group_name_ar' => 'مجموعة ضريبة القيمة المضافة',
                'group_name_en' => 'VAT Group',
                'description' => 'مجموعة ضريبة القيمة المضافة الأساسية',
                'is_active' => true,
            ],
            [
                'group_code' => 'TAX-EXEMPT',
                'group_name_ar' => 'مجموعة معفاة من الضرائب',
                'group_name_en' => 'Tax Exempt Group',
                'description' => 'مجموعة للعناصر المعفاة من الضرائب',
                'is_active' => true,
            ],
            [
                'group_code' => 'ZERO-RATE',
                'group_name_ar' => 'مجموعة الضريبة صفر%',
                'group_name_en' => 'Zero Rate Tax Group',
                'description' => 'مجموعة للعناصر ذات الضريبة صفر%',
                'is_active' => true,
            ],
        ];

        // إدراج المجموعات الضريبية
        foreach ($taxGroups as $taxGroupData) {
            $taxGroup = TaxGroup::create($taxGroupData);
            
            // إضافة ضرائب لكل مجموعة
            $this->addTaxesToGroup($taxGroup);
        }

        // إنشاء مجموعات ضريبية عشوائية لأغراض الاختبار
        if (app()->environment('local', 'testing')) {
            $this->createTestTaxGroups();
        }
    }

    /**
     * إضافة ضرائب إلى مجموعة ضريبية
     *
     * @param \App\Models\TaxGroup $taxGroup
     * @return void
     */
    protected function addTaxesToGroup($taxGroup)
    {
        $taxes = Tax::active()->inRandomOrder()->take(rand(1, 3))->get();
        
        if ($taxes->isEmpty()) {
            return;
        }
        
        $displayOrder = 1;
        
        foreach ($taxes as $tax) {
            TaxGroupMapping::create([
                'tax_group_id' => $taxGroup->id,
                'tax_id' => $tax->id,
                'display_order' => $displayOrder++,
            ]);
        }
    }

    /**
     * إنشاء مجموعات ضريبية عشوائية لأغراض الاختبار
     *
     * @return void
     */
    protected function createTestTaxGroups()
    {
        // إنشاء 5 مجموعات ضريبية عشوائية
        $taxGroups = TaxGroup::factory()
            ->count(5)
            ->create();
        
        // إضافة ضرائب عشوائية لكل مجموعة
        foreach ($taxGroups as $taxGroup) {
            $this->addTaxesToGroup($taxGroup);
        }
    }
}
