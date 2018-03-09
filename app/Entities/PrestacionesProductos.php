<?php

namespace App\Entities;

use App\Entities\User;

class PrestacionesProductos extends Entity
{
    protected $table        = 'prestaciones_productos';
    protected $fillable     = ['cantidad','unidad_medida','descripcion','importe_asignado','tipos','prestaciones_id','estado','urgente'];

    public function Prestaciones(){

        return $this->belongsTo(Prestaciones::getClass());
    }

    public function Presupuestos()
    {
        return $this->belongsToMany(Presupuestos::getClass(),'presupuestos_productos');

    }

    public function Referencias(){

        return $this->hasOne(PrestacionesProductosReferencias::getClass(),'prest_prod_id');
    }


}
