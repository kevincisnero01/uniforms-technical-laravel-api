<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnsignedToTallasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tallas', function (Blueprint $table) {
            $table->unsignedInteger('id_tipo_talla')->change();
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tallas', function (Blueprint $table) {
            $table->integer('id_tipo_talla')->change();
        });
    }
}
