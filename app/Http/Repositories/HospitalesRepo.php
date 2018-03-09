<?php namespace App\Http\Repositories;

use App\Entities\Hospitales;

class HospitalesRepo extends BaseRepo
{
    public function getModel()
    {
        return new Hospitales();
    }


}