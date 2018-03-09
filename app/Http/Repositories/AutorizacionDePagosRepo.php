<?php namespace App\Http\Repositories;


use App\Entities\AutorizacionDePagos;

class AutorizacionDePagosRepo extends BaseRepo
{
    public function getModel()
    {
        return new AutorizacionDePagos();
    }


}