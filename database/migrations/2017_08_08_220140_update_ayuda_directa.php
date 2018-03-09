<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAyudaDirecta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::table('ayuda_directa', function (Blueprint $table) {

             $table->integer('users_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ayuda_directa', function (Blueprint $table) {
            $table->dropColumn('users_id');
        });
    }
}
