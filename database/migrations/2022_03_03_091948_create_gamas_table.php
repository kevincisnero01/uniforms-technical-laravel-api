<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamas', function (Blueprint $table) {
            $table->increments('id_gama');
            $table->string('gama');
            $table->unsignedInteger('id_region')->unsigned();
            $table->string('descripcion');
            $table->string('escudo');
            $table->timestamps();

            $table->foreign('id_region')->references('id_region')->on('regiones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gamas');
    }
}
