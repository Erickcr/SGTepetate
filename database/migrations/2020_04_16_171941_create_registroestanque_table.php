<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroestanqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registroestanque', function (Blueprint $table) {
            $table->unsignedBigInteger('bitacora');
            $table->unsignedBigInteger('estanque');
            $table->primary(['bitacora','estanque']);
            $table->foreign('bitacora')
                ->references('idBitacora')
                ->on('bitacora')
                ->onDelete('cascade');
            $table->foreign('estanque')
                ->references('idEstanque')
                ->on('estanque')
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
        Schema::dropIfExists('registroestanque');
    }
}
