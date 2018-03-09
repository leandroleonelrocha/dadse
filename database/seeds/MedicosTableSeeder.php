<?php

use Illuminate\Database\Seeder;
use App\Entities\Medicos;
use App\Entities\Especialidades;

class MedicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        
        //DB::table('medicos_especialidades')->delete();
        //DB::table('especialidades')->delete();
        //DB::table('medicos')->delete();
          
        $especialidades = [
            ['id' => 1 ,'nombre' => 'clinica medica'],
            ['id' => 2 ,'nombre' => 'ginecología'],
        ];

        Especialidades::insert($especialidades);

        $medicos = [
            ['id' => 1, 'dni'=>'564898', 'nombre'=> 'Miguel', 'apellido'=>'Cano', 'matricula'=>'56445', 'tipo_matricula'=>'nacional'],
            ['id' => 2, 'dni'=>'897452', 'nombre'=> 'Roberto', 'apellido'=>'Rodriguez', 'matricula'=>'87978', 'tipo_matricula'=>'nacional'],
              
        ];

        $especialidades_id = ['1','2'];
        Medicos::insert($medicos);
        Medicos::find(1)->Especialidades()->attach($especialidades_id);
        Medicos::find(2)->Especialidades()->attach($especialidades_id);
        
        // Create permisos medicos
        

    }

}
