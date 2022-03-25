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
            $table->string('NIF');
            $table->string('placa',10);
            $table->string('email')->unique();
            $table->string('email_verified_at')->nullable();
            $table->string('name');
            $table->string('apellido');
            $table->string('password');
            $table->text('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->string('password_unhashed')->nullable();
            $table->tinyInteger ('activo')->default(1);
            $table->string('telefono1');
            $table->string('telefono2');
            $table->string('foto')->nullable();
            $table->unsignedInteger('id_rol')->nullable();
            $table->unsignedInteger('id_gama')->nullable();;
            $table->integer('puntos')->nullable();
            $table->unsignedInteger('current_team_id')->nullable();
            $table->string('profile_path_foto')->nullable();
            $table->rememberToken();
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
