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
    Schema::create('book_loans', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('book_id');
        $table->unsignedBigInteger('student_id');
        $table->date('loan_date');
        $table->date('due_date');
        $table->date('return_date')->nullable();
        $table->integer('late_days')->default(0);
        $table->enum('status', ['borrowed', 'returned'])->default('borrowed');
        $table->timestamps();
        $table->decimal('fine', 10, 2)->default(0.00);
        $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_loans');
    }
};
