<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestaciones', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('cantidad')->nullable();
            $table->integer('categorias_id')->nullable();
            $table->string('producto')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('estado')->nullable();
            $table->string('unidad_medida')->nullable();
            $table->double('importe_asignado', 10,2)->nullable();
            $table->string('resolucion')->nullable();
            $table->string('expediente')->nullable();
            $table->text('observaciones')->nullable();
            $table->tinyInteger('is_facturado');

            $table->integer('presupuesto_adjudicado')->unsigned()->nullable();
            $table->foreign('presupuesto_adjudicado')->references('id')->on('presupuestos');

            $table->integer('casos_id')->unsigned();
            $table->foreign('casos_id')->references('id')->on('casos');

            $table->integer('ayuda_directa_id')->unsigned()->nullable();
           



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prestaciones');

    }
}
