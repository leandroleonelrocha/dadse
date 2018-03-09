<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestacionesFacturasItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestaciones_facturas_items', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('prestaciones_id')->unsigned();
            $table->foreign('prestaciones_id')->references('id')->on('prestaciones');

            $table->integer('facturas_items_id')->unsigned();
            $table->foreign('facturas_items_id')->references('id')->on('facturas_items');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prestaciones_facturas_items');

    }
}
