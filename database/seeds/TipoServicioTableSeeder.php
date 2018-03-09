<?php

use Illuminate\Database\Seeder;

class TipoServicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {		
    	$rol = 'tipo proveedores';
    	$permisos = ['listar', 'crear', 'borrar'];

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
