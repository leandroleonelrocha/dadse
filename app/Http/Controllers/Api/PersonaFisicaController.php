<?php

namespace App\Http\Controllers\Api;

use App\Entities\CuentaCorriente;
use App\Http\Repositories\PersonasFisicasRepo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonaFisicaController extends Controller
{

    private $personasFisicasRepo;

    public function __construct(PersonasFisicasRepo $personasFisicasRepo)
    {
        $this->personasFisicasRepo = $personasFisicasRepo;
    }


    public function cuentaCorriente($id)
    {
        $cuenta = $this->personasFisicasRepo->cuentaCorriente($id);

        $saldo = (is_null($cuenta)) ? CuentaCorriente::first()->valor : $cuenta;

        $payload['result']['saldo'] = $saldo;

        return response()->json($payload, 200);
    }



}
