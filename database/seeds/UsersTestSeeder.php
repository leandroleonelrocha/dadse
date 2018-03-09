<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Entities\User;

class UsersTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $usuarios = [
            ['id' => 2 ,'name' => 'falfonso', 'email'=>'falfonso@desarrollosocial.gob.ar', 'username'=>'falfonso', 'is_active'=>1, 'slack_username'=>'falfonso', 'entities_id'=>1 ],
            ['id' => 4 ,'name' => 'lantonelli', 'email'=>'lantonelli@desarrollosocial.gob.ar', 'username'=>'lantonelli', 'is_active'=>1, 'slack_username'=>'lantonelli', 'entities_id'=>1 ],
            ['id' => 5 ,'name' => 'lerossi', 'email'=>'lerossi@desarrollosocial.gob.ar', 'username'=>'lerossi', 'is_active'=>1, 'slack_username'=>'lerossi', 'entities_id'=>1 ],
            ['id' => 8 ,'name' => 'gquerido', 'email'=>'gquerido@desarrollosocial.gob.ar', 'username'=>'gquerido', 'is_active'=>1, 'slack_username'=>'gquerido', 'entities_id'=>1 ],
    
            ['id' => 16,'name' => 'omcaballi', 'email'=>'omcaballi@desarrollosocial.gob.ar', 'username'=>'omcaballi', 'is_active'=>1, 'slack_username'=>'omcaballi', 'entities_id'=>1 ],
            ['id' => 18,'name' => 'srolandi', 'email'=>'srolandi@desarrollosocial.gob.ar', 'username'=>'srolandi', 'is_active'=>1, 'slack_username'=>'srolandi', 'entities_id'=>1 ],
            ['id' => 19,'name' => 'agalan', 'email'=>'agalan@desarrollosocial.gob.ar', 'username'=>'agalan', 'is_active'=>1, 'slack_username'=>'agalan', 'entities_id'=>1 ],
            ['id' => 20,'name' => 'dsalmasia', 'email'=>'dsalmasia@desarrollosocial.gob.ar', 'username'=>'dsalmasia', 'is_active'=>1, 'slack_username'=>'dsalmasia', 'entities_id'=>1 ],
            ['id' => 21,'name' => 'anmartinelli', 'email'=>'anmartinelli@desarrollosocial.gob.ar', 'username'=>'anmartinelli', 'is_active'=>1, 'slack_username'=>'anmartinelli', 'entities_id'=>1 ],
            ['id' => 22,'name' => 'vlagar', 'email'=>'vlagar@desarrollosocial.gob.ar', 'username'=>'vlagar', 'is_active'=>1, 'slack_username'=>'vlagar', 'entities_id'=>1 ],
            ['id' => 23,'name' => 'sigomez', 'email'=>'sigomez@desarrollosocial.gob.ar', 'username'=>'sigomez', 'is_active'=>1, 'slack_username'=>'sigomez', 'entities_id'=>1 ],
            ['id' => 24,'name' => 'fbuchner', 'email'=>'fbuchner@desarrollosocial.gob.ar', 'username'=>'fbuchner', 'is_active'=>1, 'slack_username'=>'fbuchner', 'entities_id'=>1 ],

            //Social
            ['id' => 7 ,'name' => 'GSREYES', 'email'=>'GSREYES@desarrollosocial.gob.ar', 'username'=>'GSREYES', 'is_active'=>1, 'slack_username'=>'GSREYES', 'entities_id'=>1 ],
            ['id' => 11,'name' => 'ATONELLI', 'email'=>'ATONELLI@desarrollosocial.gob.ar', 'username'=>'ATONELLI', 'is_active'=>1, 'slack_username'=>'ATONELLI', 'entities_id'=>1 ],
            ['id' => 14,'name' => 'jacamelo', 'email'=>'jacamelo@desarrollosocial.gob.ar', 'username'=>'jacamelo', 'is_active'=>1, 'slack_username'=>'jacamelo', 'entities_id'=>1 ],
            ['id' => 25,'name' => 'aquinteiro', 'email'=>'aquinteiro@desarrollosocial.gob.ar', 'username'=>'aquinteiro', 'is_active'=>1, 'slack_username'=>'aquinteiro', 'entities_id'=>1 ],
            ['id' => 26,'name' => 'ABERTEA', 'email'=>'ABERTEA@desarrollosocial.gob.ar', 'username'=>'ABERTEA', 'is_active'=>1, 'slack_username'=>'ABERTEA', 'entities_id'=>1 ],
            ['id' => 27,'name' => 'CALESSANDRI', 'email'=>'CALESSANDRI@desarrollosocial.gob.ar', 'username'=>'CALESSANDRI', 'is_active'=>1, 'slack_username'=>'CALESSANDRI', 'entities_id'=>1 ],
            ['id' => 28,'name' => 'emrocca', 'email'=>'emrocca@desarrollosocial.gob.ar', 'username'=>'emrocca', 'is_active'=>1, 'slack_username'=>'emrocca', 'entities_id'=>1 ],

            ['id' => 30,'name' => 'gramirez', 'email'=>'gramirez@desarrollosocial.gob.ar', 'username'=>'gramirez', 'is_active'=>1, 'slack_username'=>'gramirez', 'entities_id'=>1 ],
            ['id' => 31,'name' => 'lcrespin', 'email'=>'lcrespin@desarrollosocial.gob.ar', 'username'=>'lcrespin', 'is_active'=>1, 'slack_username'=>'lcrespin', 'entities_id'=>1 ],
            ['id' => 32,'name' => 'nlencina', 'email'=>'nlencina@desarrollosocial.gob.ar', 'username'=>'nlencina', 'is_active'=>1, 'slack_username'=>'nlencina', 'entities_id'=>1 ],
            ['id' => 33,'name' => 'pcausa', 'email'=>'pcausa@desarrollosocial.gob.ar', 'username'=>'pcausa', 'is_active'=>1, 'slack_username'=>'pcausa', 'entities_id'=>1 ],
            ['id' => 34,'name' => 'pgarrote', 'email'=>'pgarrote@desarrollosocial.gob.ar', 'username'=>'pgarrote', 'is_active'=>1, 'slack_username'=>'pgarrote', 'entities_id'=>1 ],
            // ['id' => 35,'name' => 'plipari', 'email'=>'plipari@desarrollosocial.gob.ar', 'username'=>'plipari', 'is_active'=>1, 'slack_username'=>'plipari', 'entities_id'=>1 ],
            ['id' => 36,'name' => 'LRAMENZONI', 'email'=>'LRAMENZONI@desarrollosocial.gob.ar', 'username'=>'LRAMENZONI', 'is_active'=>1, 'slack_username'=>'LRAMENZONI', 'entities_id'=>1 ],
            ['id' => 37,'name' => 'plipari', 'email'=>'plipari@desarrollosocial.gob.ar', 'username'=>'plipari', 'is_active'=>1, 'slack_username'=>'plipari', 'entities_id'=>1 ],
            ['id' => 38,'name' => 'cjguerrero', 'email'=>'cjguerrero@desarrollosocial.gob.ar', 'username'=>'cjguerrero', 'is_active'=>1, 'slack_username'=>'cjguerrero', 'entities_id'=>1 ],
            ['id' => 39,'name' => 'amlopez', 'email'=>'amlopez@desarrollosocial.gob.ar', 'username'=>'amlopez', 'is_active'=>1, 'slack_username'=>'amlopez', 'entities_id'=>1 ],
            ['id' => 40,'name' => 'mzanardi', 'email'=>'mzanardi@desarrollosocial.gob.ar', 'username'=>'mzanardi', 'is_active'=>1, 'slack_username'=>'mzanardi', 'entities_id'=>1 ],
            ['id' => 41,'name' => 'lbarreda', 'email'=>'lbarreda@desarrollosocial.gob.ar', 'username'=>'lbarreda', 'is_active'=>1, 'slack_username'=>'lbarreda', 'entities_id'=>1 ],
            ['id' => 53,'name' => 'mcrodriguez', 'email'=>'mcrodriguez@desarrollosocial.gob.ar', 'username'=>'mcrodriguez', 'is_active'=>1, 'slack_username'=>'mcrodriguez', 'entities_id'=>1 ],
            ['id' => 12,'name' => 'LRAU', 'email'=>'LRAU@desarrollosocial.gob.ar', 'username'=>'LRAU', 'is_active'=>1, 'slack_username'=>'LRAU', 'entities_id'=>1 ],
            ['id' => 15,'name' => 'rpereyra', 'email'=>'rpereyra@desarrollosocial.gob.ar', 'username'=>'rpereyra', 'is_active'=>1, 'slack_username'=>'rpereyra', 'entities_id'=>1 ],  
            ['id' => 10,'name' => 'cgarrocho', 'email'=>'cgarrocho@desarrollosocial.gob.ar', 'username'=>'cgarrocho', 'is_active'=>1, 'slack_username'=>'cgarrocho', 'entities_id'=>1 ],

            ['id' => 13,'name' => 'eRissi', 'email'=>'eRissi@desarrollosocial.gob.ar', 'username'=>'eRissi', 'is_active'=>1, 'slack_username'=>'eRissi', 'entities_id'=>1 ],
            ['id' => 57,'name' => 'iacosta', 'email'=>'iacosta@desarrollosocial.gob.ar', 'username'=>'iacosta', 'is_active'=>1, 'slack_username'=>'iacosta', 'entities_id'=>1 ],

            ['id' => 58,'name' => 'mamonti', 'email'=>'mamonti@desarrollosocial.gob.ar', 'username'=>'mamonti', 'is_active'=>1, 'slack_username'=>'mamonti', 'entities_id'=>1 ],

            ['id' => 59,'name' => 'mferrer', 'email'=>'mferrer@desarrollosocial.gob.ar', 'username'=>'mferrer', 'is_active'=>1, 'slack_username'=>'mferrer', 'entities_id'=>1 ],
             ['id' => 60,'name' => 'asagala', 'email'=>'asagala@desarrollosocial.gob.ar', 'username'=>'asagala', 'is_active'=>1, 'slack_username'=>'asagala', 'entities_id'=>1 ],


            //Ayuda directa
            ['id' => 43,'name' => 'rcimorra', 'email'=>'rcimorra@desarrollosocial.gob.ar', 'username'=>'rcimorra', 'is_active'=>1, 'slack_username'=>'rcimorra', 'entities_id'=>1 ],
            ['id' => 44,'name' => 'pcriado', 'email'=>'pcriado@desarrollosocial.gob.ar', 'username'=>'pcriado', 'is_active'=>1, 'slack_username'=>'pcriado', 'entities_id'=>1 ],
            ['id' => 45,'name' => 'lgodoy', 'email'=>'LGODOY@desarrollosocial.gob.ar', 'username'=>'lgodoy', 'is_active'=>1, 'slack_username'=>'lgodoy', 'entities_id'=>1 ], 
            ['id' => 46,'name' => 'miacovino', 'email'=>'miacovino@desarrollosocial.gob.ar', 'username'=>'miacovino', 'is_active'=>1, 'slack_username'=>'miacovino', 'entities_id'=>1 ],
            ['id' => 47,'name' => 'norlandi', 'email'=>'norlandi@desarrollosocial.gob.ar', 'username'=>'norlandi', 'is_active'=>1, 'slack_username'=>'norlandi', 'entities_id'=>1 ],
            ['id' => 48,'name' => 'dpalmas', 'email'=>'DPALMAS@desarrollosocial.gob.ar', 'username'=>'dpalmas', 'is_active'=>1, 'slack_username'=>'dpalmas', 'entities_id'=>1 ],
            ['id' => 50,'name' => 'nshor', 'email'=>'nshor@desarrollosocial.gob.ar', 'username'=>'nshor', 'is_active'=>1, 'slack_username'=>'nshor', 'entities_id'=>1 ],
            ['id' => 52,'name' => 'asanad', 'email'=>'asanad@desarrollosocial.gob.ar', 'username'=>'asanad', 'is_active'=>1, 'slack_username'=>'asanad', 'entities_id'=>1 ], 

            //Mesa de entrada
    
          ['id' => 49,'name' => 'bpato', 'email'=>'bpato@desarrollosocial.gob.ar', 'username'=>'bpato', 'is_active'=>1, 'slack_username'=>'bpato', 'entities_id'=>1 ], 
          ['id' => 51,'name' => 'ebarrientos', 'email'=>'ebarrientos@desarrollosocial.gob.ar', 'username'=>'ebarrientos', 'is_active'=>1, 'slack_username'=>'ebarrientos', 'entities_id'=>1 ],
          ['id' => 42,'name' => 'mabram', 'email'=>'mabram@desarrollosocial.gob.ar', 'username'=>'mabram', 'is_active'=>1, 'slack_username'=>'mabram', 'entities_id'=>1 ],
        ];
     
        User::insert($usuarios);


        //usuarios y rol trabajadora social
        DB::table('role_user')->insert([
         	[
                'role_id'=> 9,
                'user_id'=> 7,
            ],
            [
                'role_id'=> 9,
                'user_id'=> 10,
            ],
            [
                'role_id'=> 9,
                'user_id'=> 11,
            ],
             [
                'role_id'=> 9,
                'user_id'=> 12,
            ],
             [
                'role_id'=> 9,
                'user_id'=> 13,
            ],
             [
                'role_id'=> 9,
                'user_id'=> 14,
            ],
             [
                'role_id'=> 9,
                'user_id'=> 15,
            ],
             [
                'role_id'=> 9,
                'user_id'=> 25,
            ],
             [
                'role_id'=> 9,
                'user_id'=> 26,
            ],
             [
                'role_id'=> 9,
                'user_id'=> 27,
            ],
             [
                'role_id'=> 9,
                'user_id'=> 28,
            ],
              [
                'role_id'=> 9,
                'user_id'=> 30,
            ],
              [
                'role_id'=> 9,
                'user_id'=> 31,
            ],
              [
                'role_id'=> 9,
                'user_id'=> 32,
            ],
              [
                'role_id'=> 9,
                'user_id'=> 33,
            ],
              [
                'role_id'=> 9,
                'user_id'=> 34,
            ],
              [
                'role_id'=> 9,
                'user_id'=> 36,
            ],
              [
                'role_id'=> 9,
                'user_id'=> 37,
            ],

             [
                'role_id'=> 9,
                'user_id'=> 38,
            ],
			[
                'role_id'=> 9,
                'user_id'=> 39,
            ],
            [
                'role_id'=> 9,
                'user_id'=> 40,
            ],
            [
                'role_id'=> 9,
                'user_id'=> 41,
            ],
             [
                'role_id'=> 9,
                'user_id'=> 53,
            ],
              [
                'role_id'=> 9,
                'user_id'=> 57,
            ],
              [
                'role_id'=> 9,
                'user_id'=> 58,
            ],
              [
                'role_id'=> 9,
                'user_id'=> 59,
            ],

            //Ayuda directa roles usuarios
            [
                'role_id'=> 8,
                'user_id'=> 43,
            ],
            [
                'role_id'=> 8,
                'user_id'=> 44,
            ],
            [
                'role_id'=> 8,
                'user_id'=> 45,
            ],
            [
                'role_id'=> 8,
                'user_id'=> 46,
            ],
            [
                'role_id'=> 8,
                'user_id'=> 47,
            ],
               [
                'role_id'=> 8,
                'user_id'=> 48,
            ],
            [
                'role_id'=> 8,
                'user_id'=> 50,
            ],
          
            [
                'role_id'=> 8,
                'user_id'=> 52,
            ],
            [
                'role_id'=> 8,
                'user_id'=> 60,
            ],
            //Mesa entrada
             [
                'role_id'=> 1,
                'user_id'=> 49,
            ],
             [
                'role_id'=> 1,
                'user_id'=> 51,
            ],
             [
                'role_id'=> 1,
                'user_id'=> 42,
            ],
       
        ]);    

    }
}
