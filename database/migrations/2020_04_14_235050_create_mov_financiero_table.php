<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovFinancieroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movfinanciero', function (Blueprint $table) {
            $table->id('idMovFinanciero');
            $table->float('monto');
            $table->string('concepto',250);
            $table->unsignedBigInteger('tipoMovimiento');
            $table->foreign('tipoMovimiento')
                ->references('idTipoMovimiento')
                ->on('tipomovimiento')
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
        Schema::dropIfExists('movfinanciero');
    }
}
