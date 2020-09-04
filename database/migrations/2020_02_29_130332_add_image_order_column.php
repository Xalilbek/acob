<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageOrderColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_images', function (Blueprint $table) {
            $table->unsignedInteger('order')->default(1);
        });
        Schema::table('design_images', function (Blueprint $table) {
            $table->unsignedInteger('order')->default(1);
        });
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('pinterest_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
