<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductospedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productospedido', function (Blueprint $table) {
            $table->id('idProductoPedido');
            $table->unsignedBigInteger('idPedido');
            $table->float('precio');
            $table->float('descuento');
            $table->string('nombre',45);
            $table->unsignedInteger('cantidad');
            $table->foreign('idPedido')
                ->references('idPedido')
                ->on('pedido')
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
        Schema::dropIfExists('productospedido');
    }
}
