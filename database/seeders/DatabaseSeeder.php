<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class); // تسجيل RoleSeeder

        // تشغيل Seeders المستخدمين
        $this->call(UserSeeder::class);

        // تشغيل Seeders التصنيفات
        $this->call(CategorySeeder::class);

        // تشغيل Seeders المنتجات
        $this->call(ProductSeeder::class);

        $this->call(ProductImageSeeder::class);



    }
}
