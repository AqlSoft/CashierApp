<?php

namespace Database\Factories;

use App\Models\Tax;
use App\Models\TaxGroup;
use App\Models\TaxGroupMapping;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxGroupMappingFactory extends Factory
{
    /**
     * اسم النموذج المرتبط بالمصنع
     *
     * @var string
     */
    protected $model = TaxGroupMapping::class;

    /**
     * تعريف حالة النموذج الافتراضية
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tax_group_id' => TaxGroup::factory(),
            'tax_id' => Tax::factory(),
            'display_order' => $this->faker->numberBetween(1, 100),
        ];
    }

    /**
     * تحديد مجموعة ضريبية محددة
     *
     * @param int $taxGroupId
     * @return \Database\Factories\TaxGroupMappingFactory
     */
    public function forTaxGroup($taxGroupId)
    {
        return $this->state(function (array $attributes) use ($taxGroupId) {
            return [
                'tax_group_id' => $taxGroupId,
            ];
        });
    }

    /**
     * تحديد ضريبة محددة
     *
     * @param int $taxId
     * @return \Database\Factories\TaxGroupMappingFactory
     */
    public function forTax($taxId)
    {
        return $this->state(function (array $attributes) use ($taxId) {
            return [
                'tax_id' => $taxId,
            ];
        });
    }

    /**
     * تحديد ترتيب العرض
     *
     * @param int $order
     * @return \Database\Factories\TaxGroupMappingFactory
     */
    public function withDisplayOrder($order)
    {
        return $this->state(function (array $attributes) use ($order) {
            return [
                'display_order' => $order,
            ];
        });
    }
}
