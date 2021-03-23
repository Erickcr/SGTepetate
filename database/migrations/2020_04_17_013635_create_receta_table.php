<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receta', function (Blueprint $table) {
            $table->id('idReceta');
            $table->string('nombre',100);
            $table->text('imagen');
            $table->string('descripcion',250)->nullable();
            $table->text('ingredientes');
            $table->text('pasos');
            $table->text('videoURL')->nullable();
            $table->unsignedBigInteger('producto');
            $table->foreign('producto')
                ->references('idProducto')
                ->on('producto')
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
        Schema::dropIfExists('receta');
    }
}
