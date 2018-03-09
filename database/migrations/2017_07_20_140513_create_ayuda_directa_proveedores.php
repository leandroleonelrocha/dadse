<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAyudaDirectaProveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayuda_directa_proveedores', function (Blueprint $table) {
             $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('ayuda_directa_id');
            $table->integer('proveedores_id');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ayuda_directa_proveedores');
    }
}
