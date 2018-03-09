<?php

namespace App\Entities;

use App\Entities\User;

class PrestacionesPresupuestos extends Entity
{
    protected $table        = 'prestaciones_presupuestos';
    protected $fillable     = ['presupuestos_id','prestaciones_id'];


    public function Presupuestos()
    {
        return $this->belongsTo(Presupuestos::getClass());
    }

    public function Prestaciones()
    {
        return $this->belongsTo(Prestaciones::getClass());
    }


}
