<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Party;

class DefaultClientSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Party::create([
      'id' => 1,
      'vat_number' => '0000000001',
      'name'       => 'عميل افتراضي',
      'email'      => 'default@example.com',
      'phone'      => '0000000000',
      'type'       => 'customer',
      'is_default' => 1 // تمييز العميل كافتراضي
      

    ]);
  }
}
