<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PresupuestosAdelantos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos_adelantos', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->date('fecha');
            $table->integer('cantidad');

            $table->integer('presupuestos_id')->unsigned();
            $table->foreign('presupuestos_id')->references('id')->on('presupuestos');

            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('presupuestos_adelantos');
    }
}
