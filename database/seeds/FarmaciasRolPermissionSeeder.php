<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;

class FarmaciasRolPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = 'Farmacias';
    	$permisos = Permission::where('model','sector proveedores')->get();

    	$rol_id = \DB::table('roles')->insertGetId(array(
            'name'=> $rol,
            'slug'=> trim(str_replace(" ",".",$rol)),
            'description' => '',
            'level' => '',
        ));

      	foreach ($permisos as $permiso) {

        	$role = Role::find($rol_id);
        	$permission = Permission::find($permiso->id);
			$role->attachPermission($permission); 
        }

    }
}
