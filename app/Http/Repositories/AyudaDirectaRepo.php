<?php namespace App\Http\Repositories;


use App\Entities\AyudaDirecta;
use App\Entities\PrestacionesInformes;
use App\Entities\User;
use App\Entities\Prestaciones;
use App\Entities\Casos;
use Carbon;
use DB;
use Auth;

class AyudaDirectaRepo extends BaseRepo
{
    public function getModel()
    {
        return new AyudaDirecta();
    }


    public function create($datos)
    {
        $datos['casos_id'] = session('casos_id');
        $datos['users_id'] = Auth::user()->id;
        //1 Ayuda directa por x prestaciones
        $model =  parent::create($datos);
        $model->save();

        //1 Informe por x 1 ayuda directa
        $informe = PrestacionesInformes::create($datos);
        $model->prestaciones_informes_id = $informe->id;
        $model->save();
        
        //Se cambia el estado de cada una de las prestaciones 
        $caso = Casos::find($datos['casos_id']);
        
        foreach ($caso->Prestaciones as $prestacion) {
            if($prestacion->estado == 4)
            {
                
                $prestacion->ayuda_directa_id = $model->id;
                //Estado de la prestacion
                $prestacion->estado = 7;
                $prestacion->save();
            } 
            
        }
        
    }
 
    
    public function edit($model, $datos)
    {   

        $datos['users_id'] = Auth::user()->id;
        $model =  parent::edit($model, $datos);
        $model->touch();
        $model->PrestacionesInformes()->update($datos);

        return $model;

    }

    public function sumarMonto($casos_id){



        $qry = DB::table('prestaciones')
                ->join('casos', 'prestaciones.casos_id', '=', 'casos.id')
                ->join('ayuda_directa', 'prestaciones.ayuda_directa_id' ,'=', 'ayuda_directa.id' )
                ->where('casos.id', $casos_id)
                ->select(DB::raw('SUM(ayuda_directa.importe_autorizado) as total'))
                ->get();
                
        return $qry;    
    }


    
    
}