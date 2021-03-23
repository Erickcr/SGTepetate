<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora', function (Blueprint $table) {
            $table->id('idBitacora');
            $table->dateTime('fecha');
            $table->unsignedBigInteger('usuario');
            $table->foreign('usuario')
                ->references('idUsuario')
                ->on('usuario')
                ->onDelete('cascade');
            $table->unsignedBigInteger('movFinanciero')->nullable();
            $table->foreign('movFinanciero')
                ->references('idMovFinanciero')
                ->on('movfinanciero')
                ->onDelete('cascade');
            $table->tinyInteger('vigente');
            $table->timestamps();
            $table->unsignedBigInteger('enfermedad')->nullable();
            $table->foreign('enfermedad')
                ->references('idEnfermedad')
                ->on('enfermedad')
                ->onDelete('cascade');
            $table->text('descripcion')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora');
    }
}
