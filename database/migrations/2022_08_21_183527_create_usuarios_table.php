<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('usuario');
            $table->bigInteger('id_tipo_usuario')->unsigned();
            $table->bigInteger('id_empleado')->unsigned();
            $table->string('contrasena');
            $table->timestamps();


            $table->foreign('id_tipo_usuario')
            ->references('id')
            ->on('tipo_usuarios')
            ->onDelete('cascade');

            $table->foreign('id_empleado')
            ->references('id')
            ->on('empleados')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
