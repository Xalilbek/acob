<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_az')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();

            $table->text('content_az')->nullable();
            $table->text('content_ru')->nullable();
            $table->text('content_en')->nullable();

            $table->string('slogan_az')->nullable();
            $table->string('slogan_ru')->nullable();
            $table->string('slogan_en')->nullable();

            $table->string('image')->nullable();

            $table->string('fb_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('youtube_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
