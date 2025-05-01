<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthChecksAfter9MonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_checks_after_9_months', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('mother_id', 10); // Foreign key to mothersdatas
            $table->date('checkup_date'); // Date of the checkup
            $table->string('weight', 50); // Weight (VARCHAR)
            $table->string('blood_pressure', 255); // Blood pressure (VARCHAR)
            $table->string('glucose_level', 50); // Glucose level (VARCHAR)
            $table->string('hemoglobin_level', 50); // Hemoglobin level (VARCHAR)
            $table->string('final_supplements_given', 255)->nullable(); // Final supplements provided
            $table->text('final_health_assessment')->nullable(); // Notes on the overall health assessment
            $table->string('urine_test_results', 255)->nullable(); // Urine test results
            $table->string('fetal_position', 100)->nullable(); // Fetal position details
            $table->string('ultrasound_findings', 255)->nullable(); // Ultrasound findings
            $table->string('risk_of_complications', 255)->nullable(); // Risk of complications (e.g., "High Risk", "Low Risk")
            $table->timestamps(); // Automatically manages created_at and updated_at

            // Add foreign key constraint
            $table->foreign('mother_id')->references('id')->on('mothersdatas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('health_checks_after_9_months');
    }
}
