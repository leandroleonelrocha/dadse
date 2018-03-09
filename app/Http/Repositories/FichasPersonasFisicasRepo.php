<?php namespace App\Http\Repositories;

use App\Entities\FichasPersonasFisicas;

class FichasPersonasFisicasRepo extends BaseRepo
{
    public function getModel()
    {
        return new FichasPersonasFisicas();
    }


}