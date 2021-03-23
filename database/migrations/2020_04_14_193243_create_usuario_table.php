<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('idUsuario');
            $table->string('nombre',255);
            $table->enum('tipo',['Administrador','Tecnico','Empleado']);
            $table->string('calle',45)->nullable();
            $table->string('numCasa',10)->nullable();
            $table->string('colonia',45)->nullable();
            $table->string('ciudad',45)->nullable();
            $table->tinyInteger('estatus');
            $table->string('telefono',15)->nullable();
            $table->string('contraseña',40);
            $table->float('sueldo')->nullable();
            $table->date('fechaNac')->nullable();
            $table->date('fechaContratacion')->nullable();
            $table->text('email');
            $table->text('foto')->nullable();
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
        Schema::dropIfExists('usuario');
    }
}