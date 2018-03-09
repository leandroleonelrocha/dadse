<?php

use Illuminate\Database\Seeder;

class RolSupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol    = 'supervisor';
        $rol_id = \DB::table('roles')->insertGetId(array(
            'name'=> $rol,
            'slug'=> trim(str_replace(" ",".",$rol)),
            'description' => '',
            'level' => '',
        ));

        DB::table('permission_role')->insert([
            [
                'role_id'=> $rol_id,
                'permission_id'=> 1,
            ],
            [
                'role_id'=> $rol_id,
                'permission_id'=> 2,
            ],
            [
                'role_id'=> $rol_id,
                'permission_id'=> 3,
            ],
            [
                'role_id'=> $rol_id,
                'permission_id'=> 4,
            ],
            [
                'role_id'=> $rol_id,
                'permission_id'=> 5,
            ],
            [
                'role_id'=> $rol_id,
                'permission_id'=> 6,
            ],
    		[
                'role_id'=> $rol_id,
                'permission_id'=> 7,
            ],
            [
                'role_id'=> $rol_id,
                'permission_id'=> 16,
            ],
            [
                'role_id'=> $rol_id,
                'permission_id'=> 17,
            ],
            [
                'role_id'=> $rol_id,
                'permission_id'=> 18,
            ],
            [
                'role_id'=> $rol_id,
                'permission_id'=> 19,
            ],
            [
                'role_id'=> $rol_id,
                'permission_id'=> 50,
            ],

        ]);  


    }
}
