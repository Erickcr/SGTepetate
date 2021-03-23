<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroactividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registroactividad', function (Blueprint $table) {
            $table->unsignedBigInteger('idBitacora');
            $table->unsignedBigInteger('idActividad');
            $table->foreign('idBitacora')
                ->references('idBitacora')
                ->on('bitacora')
                ->onDelete('cascade');
            $table->foreign('idActividad')
                ->references('idActividad')
                ->on('actividad')
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
        Schema::dropIfExists('registroactividad');
    }
}
