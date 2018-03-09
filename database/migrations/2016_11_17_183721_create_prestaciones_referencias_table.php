<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestacionesReferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestaciones_referencias', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('kairos_detalle_id');
            $table->string('kairos_descripcion');
            $table->integer('kairos_presentaciones_clave');
            $table->string('kairos_presentaciones_detalle');
            $table->double('kairos_presentaciones_importe',10.2);

            $table->integer('protesis_id')->unsigned()->nulleable();
           
            $table->integer('prestaciones_id')->unsigned();
            $table->foreign('prestaciones_id')->references('id')->on('prestaciones');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prestaciones_referencias');

    }
}
