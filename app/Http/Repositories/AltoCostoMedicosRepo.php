<?php namespace App\Http\Repositories;


use App\Entities\AltoCostoMedicos;

class AltoCostoMedicosRepo extends BaseRepo
{
    public function getModel()
    {
        return new AltoCostoMedicos();
    }


}