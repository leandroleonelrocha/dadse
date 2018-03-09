<?php namespace App\Http\Repositories;


use App\Entities\Movimientos;
use App\Entities\Solicitudes;
use Illuminate\Support\Facades\Auth;

class SolicitudRepo extends BaseRepo
{
    public function getModel()
    {
        return new Solicitudes;
    }

    public function listadoTotal()
    {
        return $this->model->all();
    }

    public function actualizaMovimientos($id_solicitud , $movimiento_data){

        
        $solicitud = $this->model->find($id_solicitud);

        $movimiento = new Movimientos();
        $movimiento->users_id = Auth::user()->id;
        $movimiento->estado_movimiento = Config('custom.solicitud_estados.'.$movimiento_data);
        $movimiento->save();

        $solicitud->movimientos()->save($movimiento);


    }

    
}