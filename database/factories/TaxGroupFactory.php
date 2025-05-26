<?php

namespace Database\Factories;

use App\Models\TaxGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxGroupFactory extends Factory
{
    /**
     * اسم النموذج المرتبط بالمصنع
     *
     * @var string
     */
    protected $model = TaxGroup::class;

    /**
     * تعريف حالة النموذج الافتراضية
     *
     * @return array
     */
    public function definition()
    {
        return [
            'group_code' => 'GRP-' . $this->faker->unique()->randomNumber(4, true),
            'group_name_ar' => 'مجموعة ضريبية ' . $this->faker->word,
            'group_name_en' => 'Tax Group ' . $this->faker->word,
            'description' => $this->faker->optional(0.7)->sentence,
            'is_active' => $this->faker->boolean(90), // 90% chance of being active
            'created_by' => 1, // افتراضيًا المستخدم الأول
            'updated_by' => 1, // افتراضيًا المستخدم الأول
        ];
    }

    /**
     * حالة المجموعة النشطة
     *
     * @return \Database\Factories\TaxGroupFactory
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
     * حالة المجموعة غير النشطة
     *
     * @return \Database\Factories\TaxGroupFactory
     */
    public function inactive()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_active' => false,
            ];
        });
    }
}
