<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Permission;
use App\User;
use Bican\Roles\Models\Role;
class PrestacionesRolPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $model = 'prestaciones';

        $permisos = ['ver', 'editar', 'borrar', 'crear', 'ayuda.directa', 'alto.costo' ];


        foreach ($permisos as $permiso) {
        	$permiso_id = \DB::table('permissions')->insertGetId(array(
            'name'=> $permiso.' '.$model,
            'slug'=> $permiso.'.'.trim(str_replace(" ",".",$model)),
        	'description' => '',
        	'model' => $model,
        ));

        $role = Role::where('slug','=','medico')->first();
        $permission = Permission::find($permiso_id);
		$role->attachPermission($permission); 
        
        }

    }
}
