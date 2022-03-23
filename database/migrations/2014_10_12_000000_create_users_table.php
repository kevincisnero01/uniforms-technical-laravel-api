<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('NIF');
            $table->string('placa',10);
            $table->string('email')->unique();
            $table->string('name');
            $table->string('apellido');
            $table->string('password');
            $table->rememberToken();
            $table->tinyInteger ('activo');
            $table->string('telefono1',11);
            $table->string('telefono2',11);
            $table->string('foto')->nullable();
            $table->unsignedInteger('id_rol');
            $table->unsignedInteger('id_gama');
            $table->integer('puntos')->nullable();
            $table->unsignedInteger('current_team_id')->nullable();
            $table->string('profile_path_foto')->nullable();
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
        Schema::dropIfExists('users');
    }
}
