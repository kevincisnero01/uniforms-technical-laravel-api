<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBigIntegerToPedidoMayorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedido_mayor', function (Blueprint $table) {
            $table->bigInteger('id_user')->unsigned()->change();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedido_mayor', function (Blueprint $table) {
            $table->integer('id_user')->change();
        }); 
    }
}
