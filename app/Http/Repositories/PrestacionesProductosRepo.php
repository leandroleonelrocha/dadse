<?php
namespace App\Http\Repositories;

use App\Entities\PrestacionesProductos;


class PrestacionesProductosRepo extends BaseRepo
{
    public function getModel()
    {
        return new PrestacionesProductos();
    }


}