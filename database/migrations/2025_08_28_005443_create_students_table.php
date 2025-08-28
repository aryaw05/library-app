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
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('nis', 20)->unique();
        $table->string('name', 100);
        $table->string('class', 50);
        $table->enum('gender', ['M', 'F'])->nullable();
        $table->date('birth_date')->nullable();
        $table->text('address')->nullable();
        $table->string('phone', 20)->nullable();
        $table->string('email', 100)->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
