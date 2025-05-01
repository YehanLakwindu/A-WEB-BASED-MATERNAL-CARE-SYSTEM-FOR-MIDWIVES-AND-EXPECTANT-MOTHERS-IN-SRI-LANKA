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
        Schema::create('mothersdatas', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('national_id')();
            $table->date('date_of_birth')();
            $table->string('email')();
            $table->string('address')();
            $table->string('nearest_landmark')();
            $table->string('husband_name')();
            $table->string('husband_contact')();
            $table->string('husband_occupation')();
            $table->date('estimated_delivery_date');
            $table->date('last_menstrual_period');
            $table->text('previous_pregnancy_history');
            $table->text('known_medical_conditions');
            $table->text('current_health_status');

            $table->text('blood_type');
            $table->text('rh_factor',);
            $table->text('chronic_illnesses');
            $table->text('allergies');
            $table->text('previous_surgeries');
            $table->string('occupation');

            $table->float('current_weight');
            $table->string('profile_picture')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mothersdatas');
    }
};
