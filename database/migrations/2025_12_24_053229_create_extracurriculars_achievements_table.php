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
        Schema::create('extracurriculars_achievements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('extracurriculars_id');
            $table->string('title' , 255);
            $table->string('level',255);
            $table->date('year');
            $table->string('description',255);
            
            $table->timestamps();

             $table->foreign('extracurriculars_id')->references('id')->on('extracurriculars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extracurriculars_achievements');
    }
};
