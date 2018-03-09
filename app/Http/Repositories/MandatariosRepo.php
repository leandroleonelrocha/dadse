<?php namespace App\Http\Repositories;


use App\Entities\CuentaCorriente;
use App\Entities\Mandatarios;
use App\Entities\PersonasFisicas;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\URL;

class MandatariosRepo extends BaseRepo
{
    public function getModel()
    {
        return new Mandatarios();
    }


}