<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAddCamposLiquidacionesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('liquidaciones', function (Blueprint $table) {
            $table->string('nro_if_anexo');
            $table->string('nro_expediente_electronico');
            $table->string('nro_expediente_edadse');
            $table->string('if_proyecto_resolucion');
            $table->string('if_providencia_asubse');
            $table->string('if_providencia_resolucion');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('liquidaciones', function (Blueprint $table) {
            $table->dropColumn('nro_if_anexo');
            $table->dropColumn('nro_expediente_electronico');
            $table->dropColumn('nro_expediente_edadse');
            $table->dropColumn('if_proyecto_resolucion');
            $table->dropColumn('if_providencia_asubse');
            $table->dropColumn('if_providencia_resolucion');
            
        });
    }
}
