<?php

use Illuminate\Database\Seeder;
use App\Entities\CuentaCorriente;


class CuentaCorrienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        
        DB::table('cuenta_corriente')->delete();
                 

        $medicos = [
            'id' => 1,'dia_fin_mes'=>'29', 'valor'=>'4000'
              
        ];

        CuentaCorriente::insert($medicos);
           
        // Create permisos medicos
        

    }

}
