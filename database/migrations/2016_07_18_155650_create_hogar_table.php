<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHogarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('hogar', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('provincia');
            $table->string('ciudad');
            $table->string('partido');
            $table->string('municipio');
            $table->string('codigo_postal');

            $table->string('calle_slug');
            $table->string('calle_intersecciones');
            $table->string('numero');
            $table->string('barrio');
            $table->string('paraje');
            $table->string('manzana');
            $table->string('piso');
            $table->string('dpto');    
            $table->string('torre');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hogar');
    }
}
