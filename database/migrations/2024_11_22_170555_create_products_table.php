<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->text('description');
            $table->decimal('starting_price', 10, 2)->default(0.00);
            $table->decimal('increment_percentage', 5, 2)->default(0.00);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamp('auction_end_time')->nullable(); // وقت انتهاء المزاد
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }

};
