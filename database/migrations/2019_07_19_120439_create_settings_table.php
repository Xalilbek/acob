<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('work_times')->nullable();
            $table->text('location')->nullable();
            $table->string('logo')->nullable();
            $table->string('main_bg')->nullable();
            $table->unsignedBigInteger('lang_id');
            
            $table->foreign('lang_id')->references('id')
                ->on('langs')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
