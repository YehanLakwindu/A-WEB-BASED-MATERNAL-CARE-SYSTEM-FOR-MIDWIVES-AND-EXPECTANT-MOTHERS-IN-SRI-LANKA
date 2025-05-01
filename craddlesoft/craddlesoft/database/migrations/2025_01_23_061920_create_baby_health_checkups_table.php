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
        Schema::create('baby_health_checkups', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('baby_id'); // Foreign Key to baby_details table
            $table->date('checkup_date'); // Date of the health checkup
            $table->float('weight', 5, 2); // Baby's weight in kilograms
            $table->float('height', 5, 2); // Baby's height in centimeters
            $table->float('head_circumference', 5, 2); // Baby's head circumference in centimeters
            $table->string('feeding_status', 100)->nullable(); // Breastfed, formula-fed, etc.
            $table->text('notes')->nullable(); // Additional observations
            $table->timestamps(); // Created_at and updated_at timestamps

            // Foreign key constraint linking baby_id to baby_details table
            $table->foreign('baby_id')->references('id')->on('baby_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_health_checkups');
    }
};
