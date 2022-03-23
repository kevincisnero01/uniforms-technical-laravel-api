<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnsignedToStockProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_producto', function (Blueprint $table) {
            $table->unsignedInteger('id_product')->change();
            $table->unsignedInteger('id_talla')->change();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_producto', function (Blueprint $table) {
            $table->integer('id_product')->change();
            $table->integer('id_talla')->change();
        }); 
    }
}
