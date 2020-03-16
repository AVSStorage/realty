<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OccupationSurcharge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupation_surcharge', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('occupation_id');
            $table->float('price');
            $table->float('surcharge');
            $table->integer('day');
            $table->foreign('occupation_id')->references('id')->on('object_occupation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('occupation_surcharge');
    }
}
