<?php namespace App\Http\Repositories;


use App\Entities\FacturasItems;

class FacturasItemsRepo extends BaseRepo
{
    public function getModel()
    {
        return new FacturasItems();
    }

    public function search($factura_id){
    	return $this->model->where('facturas_id',$factura_id);
    }


}