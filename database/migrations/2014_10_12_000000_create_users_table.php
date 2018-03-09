<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();

            $table->string('username');
            $table->string('fullname');
            $table->boolean('is_active');
            $table->string('imagen');
            $table->string('imagen_thumb');
            $table->timestamp('lastlogin_date');
            $table->string('slack_username');

            $table->integer('entities_id')->unisgned();
            $table->string('entities_type')->nulleable();

            $table->integer('sedes_id');
            $table->integer('areas_id');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
