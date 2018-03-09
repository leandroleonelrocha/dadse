<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Permission;
use App\User;
use Bican\Roles\Models\Role;

class ListarExternoRolPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $rol   = 'listar casos externo';
        $model = 'casos externo';

        $permisos = ['listar'];

        $rol_id = \DB::table('roles')->insertGetId(array(
            'name'=> $rol,
            'slug'=> trim(str_replace(" ",".",$rol)),
            'description' => '',
            'level' => '',
        ));

        foreach ($permisos as $permiso) {
        	$permiso_id = \DB::table('permissions')->insertGetId(array(
            'name'=> $permiso.' '.$model,
            'slug'=> $permiso.'.'.trim(str_replace(" ",".",$model)),
        	'description' => '',
        	'model' => $model,
        ));

        	$role = Role::find($rol_id);
        	$permission = Permission::find($permiso_id);
			$role->attachPermission($permission); 
        
        }

       
    }
}
