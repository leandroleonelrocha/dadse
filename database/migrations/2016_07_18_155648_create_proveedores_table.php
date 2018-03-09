<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('proveedores', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('nombre');
            $table->string('razon_social');
            $table->integer('cuit');
            $table->string('tel');
            $table->string('contacto');
            $table->string('logo');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('provincia');
            $table->string('cp');
            $table->boolean('ayuda_directa');
            $table->integer('sedes_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proveedores');

    }
}
