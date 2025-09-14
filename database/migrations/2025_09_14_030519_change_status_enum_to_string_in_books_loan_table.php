<?php

use Illuminate\Support\Facades\DB;
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

        Schema::table('book_loans', function (Blueprint $table) {
            $table->string('status')->default('borrowed')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         DB::statement("ALTER TABLE book_loans MODIFY COLUMN status ENUM('borrowed,'returned') NOT NULL DEFAULT ' borrowed'");
    }
};
