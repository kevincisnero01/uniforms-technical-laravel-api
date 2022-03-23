<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnsignedToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('id_subfamilia')->change();
            $table->unsignedInteger('id_color')->change();
            $table->unsignedInteger('id_marca')->change();
            $table->unsignedInteger('id_iva')->change();
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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('id_subfamilia')->change();
            $table->integer('id_color')->change();
            $table->integer('id_marca')->change();
            $table->integer('id_iva')->change();
            $table->integer('id_tipo_talla')->change();
        });
    }
}
