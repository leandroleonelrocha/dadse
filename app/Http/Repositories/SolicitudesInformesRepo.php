<?php namespace App\Http\Repositories;


use App\Entities\Movimientos;
use App\Entities\SolicitudesInformes;


class SolicitudesInformesRepo extends BaseRepo
{
    public function getModel()
    {
        return new SolicitudesInformes;
    }

  
    
}