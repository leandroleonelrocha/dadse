<?php namespace App\Http\Repositories;


use App\Entities\AltoCosto;

class AltoCostoRepo extends BaseRepo
{
    public function getModel()
    {
        return new AltoCosto();
    }


}