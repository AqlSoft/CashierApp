<?php

namespace Database\Factories;

use App\Models\Tax;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxFactory extends Factory
{
    /**
     * اسم النموذج المرتبط بالمصنع
     *
     * @var string
     */
    protected $model = Tax::class;

    /**
     * تعريف حالة النموذج الافتراضية
     *
     * @return array
     */
    public function definition()
    {
        $taxRate = $this->faker->randomElement([0, 5, 10, 15, 20]);
        $taxName = 'ضريبة ' . $taxRate . '%';
        
        return [
            'tax_code' => 'TAX-' . $this->faker->unique()->randomNumber(4, true),
            'tax_name_ar' => $taxName,
            'tax_name_en' => 'Tax ' . $taxRate . '%',
            'tax_rate' => $taxRate,
            'is_active' => $this->faker->boolean(90), // 90% chance of being active
            'is_default' => false,
            'description' => $this->faker->optional(0.7)->sentence,
            'created_by' => 1, // افتراضيًا المستخدم الأول
            'updated_by' => 1, // افتراضيًا المستخدم الأول
        ];
    }

    /**
     * حالة الضريبة النشطة
     *
     * @return \Database\Factories\TaxFactory
     */
    public function active()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_active' => true,
            ];
        });
    }

    /**
     * حالة الضريبة غير النشطة
     *
     * @return \Database\Factories\TaxFactory
     */
    public function inactive()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_active' => false,
            ];
        });
    }

    /**
     * جعل الضريبة افتراضية
     *
     * @return \Database\Factories\TaxFactory
     */
    public function default()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_default' => true,
            ];
        });
    }

    /**
     * تعيين معدل ضريبي محدد
     *
     * @param float $rate
     * @return \Database\Factories\TaxFactory
     */
    public function withRate($rate)
    {
        return $this->state(function (array $attributes) use ($rate) {
            return [
                'tax_rate' => $rate,
                'tax_name_ar' => 'ضريبة ' . $rate . '%',
                'tax_name_en' => 'Tax ' . $rate . '%',
            ];
        });
    }
}
