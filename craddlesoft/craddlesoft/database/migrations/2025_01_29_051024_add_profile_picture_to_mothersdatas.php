<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_pictures', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->string('mother_id', 10); // Foreign Key (mother_id)
            $table->string('filename'); // To store the image filename
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign Key constraint, linking mother_id with mothersdatas table's id
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
        Schema::dropIfExists('profile_pictures');
    }
}
