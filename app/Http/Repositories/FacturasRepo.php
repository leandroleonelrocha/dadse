<?php namespace App\Http\Repositories;

use App\Entities\Facturas;
use DB;
class FacturasRepo extends BaseRepo
{
    public function getModel()
    {
        return new Facturas();
    }

    public function search($nro){
    	return $this->model->where('nro_factura',$nro)->first();
    }

    public function getExistResolution(){

    }



    public function resolucion($factura){

    	 $qry = DB::table('facturas_items')
                ->join('prestaciones_facturas_items', 'facturas_items.id', '=', 'prestaciones_facturas_items.facturas_items_id')
                ->join('prestaciones', 'prestaciones.id', '=', 'prestaciones_facturas_items.prestaciones_id' )
                ->where('facturas_items.facturas_id',$factura)
                ->where('prestaciones.resolucion','!=', ' ')
                ->get();
         return $qry;   
    }
  
}