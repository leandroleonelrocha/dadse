<?php
namespace App\Http\Repositories;

use App\Entities\PrestacionesPedidos;


class PrestacionesPedidosRepo extends BaseRepo
{
    public function getModel()
    {
        return new PrestacionesPedidos();
    }

    public function Prestacion(){

    	return $this->belongsTo(Prestacion::getClass());
    }

}