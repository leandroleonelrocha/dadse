<?php namespace App\Http\Repositories;


use App\Entities\CuentaCorrientePersonasFisicas;

class CuentaCorrientePersonasFisicasRepo extends BaseRepo
{
    public function getModel()
    {
        return new CuentaCorrientePersonasFisicas();
    }


}