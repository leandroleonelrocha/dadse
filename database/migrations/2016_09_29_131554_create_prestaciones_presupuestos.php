<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestacionesPresupuestos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestaciones_presupuestos', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('presupuestos_id')->unsigned();;
            $table->integer('prestaciones_id')->unsigned();;

            $table->foreign('presupuestos_id')->references('id')->on('presupuestos');
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
        Schema::drop('prestaciones_presupuestos');

    }
}
