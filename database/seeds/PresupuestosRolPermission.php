<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Permission;
use App\User;
use Bican\Roles\Models\Role;

class PresupuestosRolPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$rol = 'sector presupuestos';
    	$permisos = ['listar', 'solicitar_presupuesto', 'cargar_monto'];
        $rol_id = \DB::table('roles')->insertGetId(array(
                    
                    'name'=> $rol,
                    'slug'=> $rol,
                    'description' => '',
                    'level' => '',

        ));

        

        foreach ($permisos as $permiso) {

        	$permiso_id = \DB::table('permissions')->insertGetId(array(
            'name'=> $permiso.' '.$rol,
            'slug'=> $permiso.'.'.trim(str_replace(" ",".",$rol)),
        	'description' => '',
        	'model' => $rol,

        	));

        	$role = Role::find($rol_id);
        	$permission = Permission::find($permiso_id);
			$role->attachPermission($permission); 
        
        }

    }
}
