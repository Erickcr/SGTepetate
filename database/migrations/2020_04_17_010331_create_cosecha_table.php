<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosechaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosecha', function (Blueprint $table) {
            $table->unsignedBigInteger('idBitacora');
            $table->unsignedInteger('numPecesCosechados');
            $table->unsignedInteger('numPecesCedidos')->nullable();
            $table->unsignedInteger('numPecesComercializados')->nullable();
            $table->float('pesoTotal')->nullable();
            $table->primary('idBitacora');
            $table->foreign('idBitacora')
                ->references('idBitacora')
                ->on('bitacora')
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
        Schema::dropIfExists('cosecha');
    }
}
