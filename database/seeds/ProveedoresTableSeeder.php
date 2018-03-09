<?php

use Illuminate\Database\Seeder;
use App\Entities\ProveedoresTipos;
use App\Entities\Proveedores;
use App\Entities\ProveedoresEmail;


class ProveedoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        //DB::table('proveedores_email')->delete();
		//DB::table('proveedores_proveedores_tipos')->delete();
        //DB::table('proveedores_tipos')->delete();
		//DB::table('proveedores')->delete();

        $proveedores_tipos = [
            ['id' => 1 ,'nombre' => 'Externo'],
            ['id' => 2 ,'nombre' => 'Prótesis'],
            

        ];

        ProveedoresTipos::insert($proveedores_tipos);

        $proveedores = [
            ['id' => 1, 'cuit'=>'564898', 'nombre'=> 'Miguel', 'razon_social'=>'Farmacia Cano', 'tel'=>'564-2345', 'contacto'=>'miguel', 'direccion'=> 'av san juan 5678', 'ciudad'=>'caba', 'provincia'=>'buenos aires', 'cp'=>'8745',  'sedes_id'=>'1',   'ayuda_directa'=>'1'],
            ['id' => 2, 'cuit'=>'897452', 'nombre'=> 'Roberto', 'razon_social'=>'CP Rodriguez', 'tel'=>'879-3478', 'contacto'=>'roberto', 'direccion'=> 'av balbastro 5678', 'ciudad'=>'caba', 'provincia'=>'buenos aires','cp'=>'8745', 'sedes_id'=>'1', 'ayuda_directa'=>'1'],
        ];

        Proveedores::insert($proveedores);

        $proveedores_tipos_id = ['1','2'];
        Proveedores::find(1)->Tipos()->attach($proveedores_tipos_id);
        Proveedores::find(2)->Tipos()->attach($proveedores_tipos_id);
        
        // Create permisos medicos

        $datos['descripcion'] 		= 'MiguelCano@desarrollosocial.com';
        $datos['proveedores_id']	=  1;
        ProveedoresEmail::create($datos);
        
        $datos['descripcion'] 		= 'RobertoRodriguez@desarrollosocial.com';
        $datos['proveedores_id']	=  2;
        ProveedoresEmail::create($datos);
        

    }

}
