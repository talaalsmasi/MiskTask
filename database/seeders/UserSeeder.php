<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إضافة مستخدم أول
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'phone_number' => '1234567890',
            'password' => Hash::make('password123'), // كلمة المرور مشفرة
            'role_id' => 1, // افترض أن الدور الأول هو "Admin"
            'is_active' => true,
        ]);

        // إضافة مستخدم ثاني
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'phone_number' => '0987654321',
            'password' => Hash::make('password123'),
            'role_id' => 2, // افترض أن الدور الثاني هو "User"
            'is_active' => true,
        ]);
    }
}
