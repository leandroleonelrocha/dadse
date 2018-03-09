<?php namespace App\Http\Repositories;


use App\Entities\Compulsas;

class CompulsasRepo extends BaseRepo
{
    public function getModel()
    {
        return new Compulsas();
    }

    

}