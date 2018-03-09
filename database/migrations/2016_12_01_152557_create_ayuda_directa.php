<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAyudaDirecta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('ayuda_directa', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();


            $table->integer('cant_recetas');
            $table->integer('cant_medicamentos');
            $table->integer('cant_insumos');
            $table->double('importe_autorizado', 10, 2);
            $table->integer('prestaciones_informes_id')->unsigned();
            $table->integer('casos_id')->unsigned();
            
            /*
            $table->integer('prestaciones_id')->unsigned();
            $table->foreign('prestaciones_id')->references('id')->on('prestaciones');
            */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ayuda_directa');
    }
}
