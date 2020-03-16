<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ObjectOccupation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_occupation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('object_id');
//            $table->unsignedBigInteger('service_id');
            $table->date('date_from');
            $table->date('date_to');
            $table->float('price');
            $table->integer('min_days');
            $table->float('surcharge');
            $table->foreign('object_id')->references('id')->on('objects');
//            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('object_occupation');
    }
}
