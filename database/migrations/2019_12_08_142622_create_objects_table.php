<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type');
            $table->float('coordinateX');
            $table->float('coordinateY');
            $table->integer('center_path');
            $table->string('airport');
            $table->integer('airport_path');
            $table->string('railway');
            $table->integer('railway_path');
//            $table->integer('metro');
//            $table->integer('sea');
            $table->string('country');
            $table->string('region');
            $table->string('city');
            $table->string('area');
            $table->string('district');
            $table->string('community');
            $table->string('string');
            $table->string('house');
            $table->string('housing');
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
        Schema::dropIfExists('objects');
    }
}
