<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teacher_and_staff', function (Blueprint $table) {
            $table->id();
            $table->string('name' , 255);
            $table->string('category' , 50);
            $table->string('position' , 50);
            $table->string('photo' , 255);
            $table->integer('order' )->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_and_staff');
    }
};
