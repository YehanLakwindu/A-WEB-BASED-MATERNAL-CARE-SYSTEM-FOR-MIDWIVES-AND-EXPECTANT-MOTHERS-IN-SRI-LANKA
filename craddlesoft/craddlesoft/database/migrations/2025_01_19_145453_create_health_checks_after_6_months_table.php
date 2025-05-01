<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToHealthChecksAfter6Months extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('health_checks_after_6_months', function (Blueprint $table) {
            $table->string('mother_id', 10)->after('id');
            $table->date('checkup_date')->after('mother_id');
            $table->string('weight', 50)->after('checkup_date');
            $table->string('blood_pressure', 255)->after('weight');
            $table->string('glucose_level', 50)->after('blood_pressure');
            $table->string('hemoglobin_level', 50)->after('glucose_level');
            $table->string('vitamin_supplements', 50)->change();
            $table->string('general_health_status', 100)->nullable()->after('vitamin_supplements');
            $table->text('notes')->nullable()->after('general_health_status');

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
        Schema::table('health_checks_after_6_months', function (Blueprint $table) {
            $table->dropForeign(['mother_id']);
            $table->dropColumn(['mother_id', 'checkup_date', 'weight', 'blood_pressure', 'glucose_level', 'hemoglobin_level', 'vitamin_supplements', 'general_health_status', 'notes']);
        });
    }
}
