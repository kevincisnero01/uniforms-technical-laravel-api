<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id_product');
            $table->string('nombre');
            $table->string('referencia');
            $table->string('referencia_fab');
            $table->integer('id_subfamilia')->unsigned();
            $table->tinyInteger('men');
            $table->tinyInteger('woman');
            $table->integer('id_color')->unsigned();
            $table->string('ref_color');
            $table->integer('id_marca')->unsigned();
            $table->integer('id_iva')->unsigned();
            $table->float('precio',10,2);
            $table->float('precio_iva',10,2);
            $table->tinyInteger('oferta');
            $table->float('precio_promo',10,2);
            $table->float('precio_promo_iva',10,2);
            $table->text('desc_larga');
            $table->integer('id_tipo_talla')->unsigned();
            $table->tinyInteger('use_qty');
            $table->tinyInteger('visible');
            $table->timestamps();

            $table->foreign('id_subfamilia')->references('id_subfamilia')->on('subfamilias')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_color')->references('id_color')->on('colors')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_marca')->references('id_marca')->on('marcas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_iva')->references('id_iva')->on('ivas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_tipo_talla')->references('id_tipo_talla')->on('tipo_tallas')
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
        Schema::dropIfExists('products');
    }
}
