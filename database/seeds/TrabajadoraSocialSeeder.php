<?php

use Illuminate\Database\Seeder;

class TrabajadoraSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$rol = 'Trabajadora social';
        $rol_id = \DB::table('roles')->insertGetId(array(
            'name'=> $rol,
            'slug'=> trim(str_replace(" ",".",$rol)),
            'description' => '',
            'level' => '',
        ));

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
                'permission_id'=> 15,
                'role_id'=> $rol_id,
            ],
            [
                'permission_id'=> 16,
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

        ]);

    }	
}
