<?php

namespace App\Http\Repositories;

use App\Entities\Presupuestos;

class PresupuestosRepo extends BaseRepo {

    public function getModel(){

        return new Presupuestos();
    }

}