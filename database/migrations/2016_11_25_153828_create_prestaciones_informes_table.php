<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestacionesInformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestaciones_informes', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->date('fecha');
            $table->text('diagnostico');
            $table->string('hospital_tratante');
            $table->string('medico_tratante');
            $table->enum('tipo_matricula',['nacional','provincial']);
            $table->string('matricula');
            $table->tinyInteger('tipo_diagnostico');
            $table->text('observaciones');
            $table->integer('ciclos')->nullable();

            $table->integer('prestaciones_id')->unsigned();
           
            $table->integer('hospitales_id')->unsigned();

            $table->integer('medicos_id')->unsigned();
           // $table->foreign('medicos_id')->references('id')->on('medicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prestaciones_informes');

    }
}
