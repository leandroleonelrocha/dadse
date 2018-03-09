<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestacionesPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestaciones_pedidos', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('prestaciones_id');
            $table->integer('prestaciones_informes_id');
            $table->integer('cantidad_solicitada');
            
            
            $table->tinyInteger('estado');
            $table->tinyInteger('caracter');
                         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prestaciones_pedidos');
    }
}
