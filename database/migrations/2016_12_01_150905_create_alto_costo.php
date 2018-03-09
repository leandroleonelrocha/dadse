<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAltoCosto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alto_costo', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('estado');
            $table->date('fecha');
            $table->integer('prestaciones_informes_id')->unsigned();
            

            $table->integer('prestaciones_id')->unsigned();
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
        Schema::drop('alto_costo');

    }
}
