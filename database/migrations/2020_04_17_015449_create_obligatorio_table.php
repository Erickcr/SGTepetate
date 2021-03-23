<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObligatorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obligatorio', function (Blueprint $table) {
            $table->unsignedBigInteger('idActividad');
            $table->enum('continuidadEntidades',['1','2','3','4','5','6']);
            $table->primary('idActividad');
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
        Schema::dropIfExists('obligatorio');
    }
}
