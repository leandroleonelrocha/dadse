<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMandatariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mandatarios', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('fullname');
            $table->date('fecha_nacimiento');
            $table->string('tipo_documento');
            $table->string('documento');
            $table->string('email');
            $table->string('telefono_particular');
            $table->string('telefono_movil');

            $table->integer('casos_id')->unsigned();
            $table->foreign('casos_id')->references('id')->on('casos');





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mandatarios');
    }
}
