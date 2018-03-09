<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePrestacionesPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prestaciones_pedidos', function (Blueprint $table) {
            $table->integer('cantidad_ofertada')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::table('prestaciones_pedidos', function (Blueprint $table) {
        
             $table->dropColumn('cantidad_ofertada');
        });
    }
}
