<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('evaluacion_social', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->tinyInteger('informe_social');
            $table->string('lic_trabajo_social_interviniente');
           // $table->integer('matricula');
            
            $table->tinyInteger('direccion');
            $table->string('direccion_numero');
            $table->tinyInteger('institucion');
            $table->tinyInteger('posee_obra_social');
            $table->tinyInteger('registra_afiliacion_salud');
            $table->tinyInteger('cobertura_provincial');
                
            $table->string('obra_social');
            $table->tinyInteger('certificacion_negativa');
            $table->string('observaciones');
            $table->tinyInteger('negativa_municipal');
            $table->tinyInteger('negativa_provincial');
            $table->string('coparticipacion_provincial');
            $table->string('otra_negativa');
            

            $table->string('consideraciones');
            $table->string('valoracion_profesional');

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
        Schema::drop('evaluacion_social');
    }
}
