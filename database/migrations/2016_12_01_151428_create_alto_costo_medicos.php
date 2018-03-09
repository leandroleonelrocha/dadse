<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAltoCostoMedicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alto_costo_medicos', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->date('fecha_envio');
            $table->date('fecha_recepcion');
            $table->string('estado');

            $table->integer('alto_costo_id')->unsigned();
            $table->foreign('alto_costo_id')->references('id')->on('alto_costo');

            $table->integer('medicos_id')->unsigned();
            $table->foreign('medicos_id')->references('id')->on('medicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('alto_costo_medicos');
    }
}
