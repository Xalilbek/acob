<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable();
            $table->string('total_area')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->string('used_area')->nullable();
            $table->integer('room_count')->nullable();
            $table->string('cash')->nullable();
            $table->string('price')->nullable();
            $table->string('payment_time')->nullable();
            $table->string('first_payment')->nullable();
            $table->string('monthly_payment')->nullable();
            $table->string('type')->default(0);
            $table->string('prepared_type')->nullable();
//            $table->string('concrete')->nullable();
//            $table->string('armatur')->nullable();
//            $table->string('between_floors')->nullable();
//            $table->string('roof')->nullable();
//            $table->string('roof_insulation')->nullable();
//            $table->string('masonry')->nullable();
//            $table->string('cement')->nullable();
//            $table->string('ceiling')->nullable();
//            $table->string('interior_painting')->nullable();
//            $table->string('the_front_of_the_facade')->nullable();
//            $table->string('electrical_wiring')->nullable();
//            $table->string('plumbing_products')->nullable();
//            $table->string('flooring')->nullable();
//            $table->string('window')->nullable();
//            $table->string('entrance_gate')->nullable();
//            $table->string('warm_flooring')->nullable();
            $table->unsignedBigInteger('lang_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
