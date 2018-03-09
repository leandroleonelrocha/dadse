<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_items', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('cantidad');
            $table->double('precio_unitario', 10.2);
            $table->double('subtotal', 10.2);
            $table->string('detalle');


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
        Schema::drop('facturas_items');

    }
}
