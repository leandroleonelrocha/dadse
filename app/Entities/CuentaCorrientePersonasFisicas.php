<?php

namespace App\Entities;


class CuentaCorrientePersonasFisicas extends Entity
{
    protected $table        = 'cuenta_corriente_personas_fisicas';
    protected $fillable     = ['fecha_autorizacion', 'importe_autorizado','fecha_liquidacion','importe_liquidado','solicitudes_id'];

}
