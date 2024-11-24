<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // المفتاح الأساسي
            $table->string('name'); // اسم المستخدم
            $table->string('email')->unique(); // البريد الإلكتروني (يجب أن يكون فريدًا)
            $table->string('phone_number')->unique(); // رقم الهاتف (يجب أن يكون فريدًا)
            $table->string('password'); // كلمة المرور
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade'); // الربط مع جدول roles
            $table->boolean('is_active')->default(true); // حالة المستخدم (نشط/غير نشط)
            $table->timestamp('email_verified_at')->nullable(); // التحقق من البريد الإلكتروني
            $table->timestamps(); // حقول created_at و updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }

};
