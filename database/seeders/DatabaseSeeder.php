<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tax;
use Database\Seeders\TaxGroupSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // إنشاء مستخدم افتراضي
        User::factory()->create([
            'name' => 'مدير النظام',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        // إنشاء ضرائب افتراضية إذا لم تكن موجودة
        if (Tax::count() === 0) {
            $this->call(TaxSeeder::class);
        }

        // إنشاء مجموعات ضريبية
        $this->call(TaxGroupSeeder::class);
    }
}
