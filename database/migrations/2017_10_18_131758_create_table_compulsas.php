<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompulsas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('compulsas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->date('fecha_solicitud');
            $table->dateTime('fecha_cierre');
            $table->dateTime('fecha_apertura_sobre');
            $table->tinyInteger('estado');

            //$table->integer('proveedores_id')->unsigned();
            //$table->foreign('proveedores_id')->references('id')->on('proveedores');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('compulsas');
    }
}
