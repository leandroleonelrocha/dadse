<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->date('fecha_solicitud');
            $table->double('total');
            $table->string('estado');
            $table->dateTime('fecha_cierre');
            $table->dateTime('fecha_apertura_sobre');
            $table->tinyInteger('caracter');
            $table->string('observacion');
            $table->string('file_name');
            $table->integer('cantidad');
            $table->double('precio_unitario');

            $table->integer('compulsa_id')->nullable();

            $table->integer('users_id')->unsigned();
            $table->integer('proveedores_id')->unsigned();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('proveedores_id')->references('id')->on('proveedores')->onDelete('cascade');

            $table->string('observacion_adjudicacion')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('presupuestos');

    }
}
