<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إنشاء الأدوار
        Role::create([
            'name' => 'Admin', // دور المشرف
        ]);

        Role::create([
            'name' => 'User', // دور المستخدم العادي
        ]);

        Role::create([
            'name' => 'Seller', // دور البائع
        ]);
    }
}
