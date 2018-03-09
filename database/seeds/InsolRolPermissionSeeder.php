<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Permission;
use App\User;
use Bican\Roles\Models\Role;

class InsolRolPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $model = 'insol';
        $permisos = ['listar','aceptar', 'ver', 'borrar' ];

      
        foreach ($permisos as $permiso) {
        	$permiso_id = \DB::table('permissions')->insertGetId(array(
            'name'=> $permiso.' '.$model,
            'slug'=> $permiso.'.'.trim(str_replace(" ",".",$model)),
        	'description' => '',
        	'model' => $model,
        ));


        	$role = Role::where('slug','=','mesa.de.entrada')->first();
        	$permission = Permission::find($permiso_id);
			$role->attachPermission($permission); 
        
        }
    }
}
