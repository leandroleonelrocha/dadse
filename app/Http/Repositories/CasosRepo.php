<?php namespace App\Http\Repositories;


use App\Entities\Casos;
use App\Entities\Movimientos;
use App\Http\Functions\ApimdsFunction;
use App\Http\Functions\InsolFunction;
use Illuminate\Support\Facades\Auth;
use DB;
class CasosRepo extends BaseRepo
{
    public function getModel()
    {
        return new Casos();
    }

    public function listadoTotal($limit = null)
    {
        return $this->model->orderBy('created_at', 'desc')->where('estado_nombre','!=','Finalizado')->paginate($limit);
    }

    public function listadoFinalizados($limit = null){

        return $this->model->orderBy('created_at', 'desc')->where('estado_nombre','=','Finalizado')->paginate($limit);
    }

    public  function search($limit = null , $search = null)
    {
        return $this->model->where('id','like','%'.$search.'%')
            ->orWhere('estado_nombre','like','%'.$search.'%')
            ->orWhereHas('PersonasFisicas',function($q) use ($search)
            {
                   $q->where('documento','like','%'.$search.'%');

            })
            ->orWhereHas('PersonasFisicas',function($q) use ($search)
            {
                $q->where('fullname','like','%'.$search.'%');

            })
            ->paginate($limit);

    }




    public function getMandatarios($casos_id = null )
    {
        $insolFunction =  new InsolFunction();
        $insolFunction->getCasosDetalle($casos_id);
        if(!isset($insolFunction->getResultado()->error))
            return $insolFunction->getResultado()->result;
        else 
            return [];
    }

    public function actualizaMovimientos($id_caso , $movimiento_data)
    {
        $caso = $this->model->find($id_caso);

        $movimiento = new Movimientos();
        $movimiento->users_id = Auth::user()->id;

        $movimiento->estado_movimiento = $movimiento_data;
        $movimiento->save();

        $caso->movimientos()->save($movimiento);
    }

     public function totalCuentaCorriente($id){
        $qry         = DB::table('casos')
                         ->select(DB::raw('SUM(ayuda_directa.importe_autorizado) as total'))
                         ->join('prestaciones', 'prestaciones.casos_id', '=', 'casos.id')
                         ->join('ayuda_directa', 'ayuda_directa.prestaciones_id', '=', 'prestaciones.id')
                         ->where('casos.id', $id)
                         ->get();
       return $qry;

    }

    public function getMandatariosFromApi($casos_id = null )
    {
        $insolFunction =  new InsolFunction();
        $insolFunction->getCasosDetalle($casos_id);

        return $insolFunction->getResultado()->result;

    }


    public function getSolicitanteFromApi($casos_id = null)
    {
        $insolFunction = new InsolFunction();
        $insolFunction->getCasosDetalle($casos_id);

        return $insolFunction->getResultado()->result;
    }

    
}