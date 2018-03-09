<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizaciones', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('org_denominacion');

            $table->string('org_cuit');

            $table->string('org_domiciolio_barrio');
            $table->string('org_domicilio_piso');
            $table->string('org_domicilio_provincia');
            $table->string('org_domicilio_codigo_postal');
            $table->string('org_domicilio_calle');
            $table->string('org_domicilio_numero');

            $table->string('org_email');
            $table->string('org_telefono');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('organizaciones');

    }
}
