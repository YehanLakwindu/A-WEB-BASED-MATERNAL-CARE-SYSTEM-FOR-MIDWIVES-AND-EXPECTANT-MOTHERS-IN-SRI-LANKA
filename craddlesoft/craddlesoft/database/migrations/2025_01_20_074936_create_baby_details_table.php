<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBabyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baby_details', function (Blueprint $table) {
            $table->id();
            $table->string('mother_id'); // Foreign key linking to mother's data
            $table->string('baby_name');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->float('birth_weight');
            $table->float('birth_length');
            $table->string('blood_type');
            $table->string('medical_conditions')->nullable(); // Optional medical conditions
            $table->timestamps();

            // Foreign key linking to mothersdata table
            $table->foreign('mother_id')->references('id')->on('mothersdata')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baby_details');
    }
}
