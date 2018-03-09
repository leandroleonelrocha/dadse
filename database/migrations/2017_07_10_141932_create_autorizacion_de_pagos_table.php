<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutorizacionDePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autorizacion_de_pagos', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('remito_foja');
            $table->integer('factura_foja');
            $table->integer('troqueles_foja');
            $table->integer('forma_pago');
            

            $table->integer('facturas_id')->unsigned();
            $table->foreign('facturas_id')->references('id')->on('facturas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('autorizacion_de_pagos');
    }
    
}
