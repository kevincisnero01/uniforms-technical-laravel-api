<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id_pedidos');
            $table->bigInteger('id_user')->unsigned();
            $table->float('total_pedido',10,2);
            $table->integer('id_pedidos_status')->unsigned();
            $table->integer('id_pedido_mayor')->unsigned();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_pedidos_status')->references('id_pedidos_status')->on('pedidos_status')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_pedido_mayor')->references('id_pedido_mayor')->on('pedido_mayor')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
