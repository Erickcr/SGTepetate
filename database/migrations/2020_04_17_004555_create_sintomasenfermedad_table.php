<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSintomasenfermedadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sintomasenfermedad', function (Blueprint $table) {
            $table->unsignedBigInteger('idEnfermedad');
            $table->unsignedBigInteger('idSintoma');
            $table->primary(['idEnfermedad','idSintoma']);
            $table->foreign('idEnfermedad')
                ->references('idEnfermedad')
                ->on('enfermedad')
                ->onDelete('cascade');
            $table->foreign('idSintoma')
                ->references('idSintoma')
                ->on('sintoma')
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
        Schema::dropIfExists('sintomasenfermedad');
    }
}
