<?php
namespace App\Http\Repositories;

use App\Entities\PrestacionesReferencias;


class PrestacionesReferenciasRepo extends BaseRepo
{
    public function getModel()
    {
        return new PrestacionesReferencias();
    }


}