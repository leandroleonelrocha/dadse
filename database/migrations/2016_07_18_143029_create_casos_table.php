<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('user_id');
            $table->string('user_full_name');
            $table->string('user_user_name');
            $table->integer('estado_id');
            $table->string('estado_nombre');
            $table->string('estado_slug');
            $table->string('observaciones');
            $table->string('destinatario_type');
            $table->string('destinatario_id');
            $table->string('canal_id');
            $table->string('canal_nombre');

            $table->integer('tipo_id');
            $table->string('tipo_nombre');
            $table->string('tipo_slug');
            $table->tinyInteger('ayuda_directa')->nulleable();
            $table->tinyInteger('alto_costo')->nulleable();

            $table->integer('personas_fisicas_id')->unsigned();
            $table->integer('organizaciones_id')->unsigned();

            //$table->foreign('personas_fisicas_id')->references('id')->on('personas_fisicas');
            //$table->foreign('organizaciones_id')->references('id')->on('organizaciones');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('casos');
    }
}
