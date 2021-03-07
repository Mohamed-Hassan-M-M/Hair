<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('face_shape_id')->nullable();
            $table->unsignedBigInteger('skin_tone_id')->nullable();
            $table->unsignedBigInteger('hair_style_id')->nullable();
            $table->unsignedBigInteger('hair_length_id')->nullable();
            $table->unsignedBigInteger('hair_color_id')->nullable();
            $table->string('uploaded_image',255);//image
            $table->string('saved_image',255);//image
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_features');
    }
}
