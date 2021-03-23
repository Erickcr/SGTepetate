<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->id('idPedido');
            $table->string('telefono',15);
            $table->string('direccion',255);
            $table->string('nombre',45);
            $table->string('correo',45);
            $table->string('descripcion',255)->nullable();
            $table->date('fecha');
            $table->float('total');
            $table->enum('estatus',['Disponible','En contacto','Terminado','Completado']);
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
        Schema::dropIfExists('pedido');
    }
}
