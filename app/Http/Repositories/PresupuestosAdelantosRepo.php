<?php
namespace App\Http\Repositories;

use App\Entities\PresupuestosAdelantos;
use App\Entities\User;

class PresupuestosAdelantosRepo extends BaseRepo
{
    public function getModel()
    {
        return new PresupuestosAdelantos();
    }
    
}