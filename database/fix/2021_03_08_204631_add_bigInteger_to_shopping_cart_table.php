<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBigIntegerToShoppingCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shopping_cart', function (Blueprint $table) {
            $table->bigInteger('id_user')->unsigned()->change();
            $table->unsignedInteger('id_product')->change();
            $table->unsignedInteger('id_pedidos')->change();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shopping_cart', function (Blueprint $table) {
            $table->integer('id_user')->change();
            $table->integer('id_product')->change();
            $table->integer('id_pedidos')->change();
        }); 
    }
}
