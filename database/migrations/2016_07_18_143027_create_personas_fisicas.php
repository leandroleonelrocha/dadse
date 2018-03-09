<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasFisicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_fisicas', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->string('fullname');
            $table->string('nacionalidad');
            $table->date('fecha_nacimiento');
            $table->string('sexo');
            $table->string('estado_civil');

            $table->string('tipo_documento');
            $table->string('documento');
            $table->string('cuil');
            $table->string('email');
            $table->string('imagen')->nullable();
            $table->string('telefono_particular');
            $table->string('telefono_movil');
            $table->string('hogar_id');    
            $table->tinyInteger('jefe_hogar')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personas_fisicas');

    }
}
