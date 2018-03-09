<?php

use Illuminate\Database\Seeder;
use App\Entities\Hospitales;

class HospitalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	

        $hospitales = [
            ['id' => 1, 'descripcion'=>'Hospital Italiano',   'ciudad'=> 'San justo', 'provincia'=>'Buenos Aires'],
            ['id' => 2, 'descripcion'=>'Hospital Británico', 'ciudad'=> 'Caba', 'provincia'=>'Buenos Aires'],
          	['id' => 3, 'descripcion'=>'Hospital Guemes', 'ciudad'=> 'Haedo', 'provincia'=>'Buenos Aires'],

               
        ];

       
        Hospitales::insert($hospitales);

        $rol = 'hospitales';
        $permisos = ['listar', 'editar', 'crear', 'borrar'];

        foreach ($permisos as $permiso) {

            $permiso_id = \DB::table('permissions')->insertGetId(array(
            'name'=> $permiso.' '.$rol,
            'slug'=> $permiso.'.'.trim(str_replace(" ",".",$rol)),
            'description' => '',
            'model' => $rol,

            ));
        
        }   

    }
}
