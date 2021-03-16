<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombinationFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combination_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('face_shape_id')->nullable();
            $table->unsignedBigInteger('skin_tone_id')->nullable();
            $table->unsignedBigInteger('hair_style_id')->nullable();
            $table->unsignedBigInteger('hair_length_id')->nullable();
            $table->unsignedBigInteger('hair_color_id')->nullable();
            $table->string('link_url',255);//image
            $table->timestamps()->useCurrent();
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
