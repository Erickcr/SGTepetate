<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModificacioninventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modificacioninventario', function (Blueprint $table) {
            $table->unsignedBigInteger('bitacora');
            $table->unsignedBigInteger('inventario');
            $table->enum('tipo',['Entrada','Salida']);
            $table->float('cantidad');
            $table->primary('bitacora');
            $table->foreign('bitacora')
                ->references('idBitacora')
                ->on('bitacora')
                ->onDelete('cascade');
            $table->foreign('inventario')
                ->references('idInventario')
                ->on('inventario')
                ->onDelete('cascade');
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
        Schema::dropIfExists('modificacioninventario');
    }
}
