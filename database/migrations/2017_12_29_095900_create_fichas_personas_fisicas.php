<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichasPersonasFisicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas_personas_fisicas', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->text('vivienda')->nullable();
            $table->text('salud')->nullable();
            $table->text('situacion_laboral')->nullable();
            $table->text('conclusiones')->nullable();
           
            $table->integer('personas_fisicas_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();

        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fichas_personas_fisicas');
    }
}
