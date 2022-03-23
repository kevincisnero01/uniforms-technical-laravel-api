<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrimaryKeyToStockProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_producto', function (Blueprint $table) {
            $table->primary(['id_product', 'id_talla']);
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
            $table->dropPrimary('id_product');
            $table->dropPrimary('id_talla');
        });
    }
}
