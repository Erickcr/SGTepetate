<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->id('idInventario');
            $table->string('nombre',50);
            $table->float('cantidad');
            $table->string('descripcion',250)->nulablle();
            $table->unsignedBigInteger('categoria');
            $table->unsignedBigInteger('unidadMedida');
            $table->foreign('categoria')
                ->references('idCategoria')
                ->on('categoria')
                ->onDelete('cascade');
            $table->foreign('unidadMedida')
                ->references('idUnidadMedida')
                ->on('unidadmedida')
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
        Schema::dropIfExists('inventario');
    }
}
