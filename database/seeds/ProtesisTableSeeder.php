<?php

use Illuminate\Database\Seeder;

class ProtesisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = 'protesis';
    	$permisos = ['listar', 'crear', 'editar', 'borrar'];
   
        foreach ($permisos as $permiso) {

        	$permiso_id = \DB::table('permissions')->insertGetId(array(
            'name'=> $permiso.' '.$rol,
            'slug'=> $permiso.'.'.trim(str_replace(" ",".",$rol)),
        	'description' => '',
        	'model' => $rol,

        	));

        }
    }
}
