<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Permission;
use App\User;
use Bican\Roles\Models\Role;

class AdministradorPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	$rol = 'administrador';
    	$permisos = Permission::all();

        $rol_id = \DB::table('roles')->insertGetId(array(
                    
                    'name'=> $rol,
                    'slug'=> $rol,
                    'description' => '',
                    'level' => '',

        ));

        

        foreach ($permisos as $permiso) {

        	$role = Role::find($rol_id);

			$role->attachPermission($permiso); 
        
        }

    }
}
