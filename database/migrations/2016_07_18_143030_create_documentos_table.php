<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('documentos', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('file_type');
            $table->string('file_size');
            $table->string('file_extensions');
            $table->string('descripcion');
            $table->string('observaciones');
            $table->string('user_id');
           

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
       Schema::drop('documentos');
    }
}
