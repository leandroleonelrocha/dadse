<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentaCorrientePersonasFisicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cuenta_corriente_personas_fisicas', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->date('fecha_autorizacion');
            $table->double('importe_autorizado',10, 2);
            $table->date('fecha_liquidacion');    
            $table->date('importe_liquidado');   
            
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
        Schema::drop('cuenta_corriente_personas_fisicas');

    }
}
