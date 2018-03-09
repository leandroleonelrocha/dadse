<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Entities\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        $usuarios = [
            ['id' => 1 ,'name' => 'llrocha', 'email'=>'llrocha@desarrollosocial.gob.ar', 'username'=>'llrocha', 'is_active'=>1, 'slack_username'=>'llrocha', 'entities_id'=>1 ],
            ['id' => 3 ,'name' => 'mbarrios', 'email'=>'mbarrios@desarrollosocial.gob.ar', 'username'=>'mbarrios', 'is_active'=>1, 'slack_username'=>'mbarrios', 'entities_id'=>1 ],
            ['id' => 6 ,'name' => 'framato', 'email'=>'framato@desarrollosocial.gob.ar', 'username'=>'framato', 'is_active'=>1, 'slack_username'=>'framato', 'entities_id'=>1 ],
            ['id' => 17,'name' => 'fcastillo', 'email'=>'fercastillo@me.com', 'username'=>'fcastillo', 'is_active'=>1, 'slack_username'=>'fcastillo', 'entities_id'=>1 ],
            ['id' => 9 ,'name' => 'nmonja', 'email'=>'nmonja@desarrollosocial.gob.ar', 'username'=>'nmonja', 'is_active'=>1, 'slack_username'=>'nmonja', 'entities_id'=>1 ],
           

        ];
     
        User::insert($usuarios);


        //usuarios segun permisos
        DB::table('role_user')->insert([
            [
                'role_id'=> 7,
                'user_id'=> 1,
            ],
            [
                'role_id'=> 7,
                'user_id'=> 3,
            ],
            [
                'role_id'=> 7,
                'user_id'=> 6,
            ],
            [
                'role_id'=> 7,
                'user_id'=> 17,
            ],
            [
                'role_id'=> 7,
                'user_id'=> 9,
            ],
    
        ]);    
    }
}
