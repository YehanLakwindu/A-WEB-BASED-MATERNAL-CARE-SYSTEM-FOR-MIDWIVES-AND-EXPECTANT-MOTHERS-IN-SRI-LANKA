<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBabyVaccinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baby_vaccinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('baby_id'); // Foreign key linking to baby_details
            $table->string('vaccine_name');
            $table->date('vaccination_date');
            $table->string('dose'); // e.g., "1st Dose", "2nd Dose", etc.
            $table->string('milestone'); // e.g., "0-4 Weeks", "2 Months", etc.
            $table->string('notes')->nullable(); // Optional notes
            $table->timestamps();

            // Foreign key linking to baby_details table
            $table->foreign('baby_id')->references('id')->on('baby_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baby_vaccinations');
    }
}
