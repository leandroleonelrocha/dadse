<?php

namespace App\Entities;


class CuentaCorriente extends Entity
{
    protected $table        = 'cuenta_corriente';
    protected $fillable     = ['dia_fin_mes','valor'];

}
