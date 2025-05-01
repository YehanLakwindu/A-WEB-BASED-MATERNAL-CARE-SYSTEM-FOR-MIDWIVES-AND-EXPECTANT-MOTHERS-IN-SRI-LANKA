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
        Schema::create('midwives', function (Blueprint $table) {

            $table->string('midwife_id', 10)->unique(); // Midwife ID with unique constraint
            $table->string('full_name'); // Full name column
            $table->string('email')->unique(); // Email column
            $table->string('contact_number')->nullable(); // Contact number (nullable)
            $table->string('specialty')->nullable(); // Specialty (nullable)
            $table->integer('years_of_experience')->nullable(); // Years of experience (nullable)
            $table->string('work_location')->nullable(); // Work location (nullable)
            $table->text('address')->nullable(); // Address (nullable)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('midwives');
    }
};
