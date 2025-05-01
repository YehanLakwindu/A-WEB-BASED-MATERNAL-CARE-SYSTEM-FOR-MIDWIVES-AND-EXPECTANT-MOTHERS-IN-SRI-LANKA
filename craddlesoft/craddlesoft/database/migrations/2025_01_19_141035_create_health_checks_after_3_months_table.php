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
        Schema::create('health_checks_after_3_months', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('mother_id', 10); // Foreign key to mothersdatas
            $table->date('checkup_date'); // Date field for checkup
            $table->string('weight', 50); // Weight (VARCHAR)
            $table->string('blood_pressure', 255); // Blood pressure (VARCHAR)
            $table->string('glucose_level', 50); // Glucose level (VARCHAR)
            $table->string('hemoglobin_level', 50); // Hemoglobin level (VARCHAR)
            $table->text('notes')->nullable(); // Notes (TEXT, optional)
            $table->timestamps(); // Automatically manages created_at and updated_at

            // Add foreign key constraint
            $table->foreign('mother_id')->references('id')->on('mothersdatas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_checks_after_3_months');
    }
};
