<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
class AyudasDirectaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = 'ayuda directa';
        $rol_id = \DB::table('roles')->insertGetId(array(
            'name'=> $rol,
            'slug'=> trim(str_replace(" ",".",$rol)),
            'description' => '',
            'level' => '',
        ));

        $permisos = ['borrar','editar'];
        foreach ($permisos as $permiso) {
                $permiso_id = \DB::table('permissions')->insertGetId(array(
                'name'=> trim(str_replace(" ",".",$permiso)).'.'.trim(str_replace(" ",".",$rol)),
                'slug'=> trim(str_replace(" ",".",$permiso)).'.'.trim(str_replace(" ",".",$rol)),
                'description' => '',
                'model' => $rol,
            ));

                $role = Role::find($rol_id);
                $permission = Permission::find($permiso_id);
                $role->attachPermission($permission);       
        }

        //Rol y permisos
        DB::table('permission_role')->insert([
            [
                'permission_id'=> 1,
                'role_id'=> $rol_id,
            ],
         	[
                'permission_id'=> 2,
                'role_id'=> $rol_id,
            ],
			[
                'permission_id'=> 3,
                'role_id'=> $rol_id,
            ],
            [
                'permission_id'=> 4,
                'role_id'=> $rol_id,
            ],
            [
                'permission_id'=> 5,
                'role_id'=> $rol_id,
            ],
            [
                'permission_id'=> 6,
                'role_id'=> $rol_id,
            ],
            [
                'permission_id'=> 7,
                'role_id'=> $rol_id,
            ], 
            [
                'permission_id'=> 12,
                'role_id'=> $rol_id,
            ],
            [
                'permission_id'=> 13,
                'role_id'=> $rol_id,
            ],
            [
                'permission_id'=> 14,
                'role_id'=> $rol_id,
            ],
            [
                'permission_id'=> 16,
                'role_id'=> $rol_id,
            ],
             [
                'permission_id'=> 17,
                'role_id'=> $rol_id,
            ],
            [
                'permission_id'=> 18,
                'role_id'=> $rol_id,
            ],
            [
                'permission_id'=> 19,
                'role_id'=> $rol_id,
            ],
            [
                'permission_id'=> 20,
                'role_id'=> $rol_id,
            ],
            [
                'permission_id'=> 21,
                'role_id'=> $rol_id,
            ],
            [
                'permission_id'=> 40,
                'role_id'=> $rol_id,
            ],
        ]);
    }
}
