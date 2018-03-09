<?php namespace App\Http\Repositories;

use App\Entities\Liquidaciones;
use DB;
class LiquidacionesRepo extends BaseRepo
{
    public function getModel()
    {
        return new Liquidaciones();
    }
 	
 	public function searchLiquidacion($search){
        return $this->model->where('nro_liquidacion_interna','=', $search)->first();
    }
 
}