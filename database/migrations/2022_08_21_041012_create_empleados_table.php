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
        Schema::create('empleados', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('dpi');
            //$table->bigInteger('id_tipo_usuario')->unsigned();
            $table->bigInteger('id_departamento')->unsigned();
            //$table->bigInteger('id_usuario')->unsigned();
            $table->date('fecha_inicio_labores');
            $table->date('fecha_nacimiento');
            $table->timestamps();
            


          /*  $table->foreign('id_tipo_usuario')
                ->references('id')
                ->on('tipo_usuarios')
                ->onDelete('cascade');*/

           /*$table->foreign('id_usuario')
                ->references('id')
                ->on('usuarios')
                ->onDelete('cascade');*/

            $table->foreign('id_departamento')
                ->references('id')
                ->on('departamentos')
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
        Schema::dropIfExists('empleados');
    }
};
