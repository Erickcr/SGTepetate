<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConteoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conteo', function (Blueprint $table) {
            $table->unsignedBigInteger('idBitacora');
            $table->string('observaciones',250)->nullable();
            $table->primary('idBitacora');
            $table->foreign('idBitacora')
                ->references('idBitacora')
                ->on('bitacora')
                ->onDelete('cascade');
            $table->integer('numeroDePeces');
            $table->float('longitud');
            $table->float('peso');
            $table->unsignedInteger('pecesMuertos')->nullable();
            $table->string('causaMuerte',250)->nullable();
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
        Schema::dropIfExists('conteo');
    }
}
