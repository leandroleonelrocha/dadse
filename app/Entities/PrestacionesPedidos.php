<?php

namespace App\Entities;


class PrestacionesPedidos extends Entity
{
    protected $table        = 'prestaciones_pedidos';
    protected $fillable 	= ['prestaciones_id', 'prestaciones_informes_id', 'cantidad_solicitada', 'estado', 'caracter'];

    public function Prestacion(){
    	return $this->belongsTo(Prestaciones::getClass(), 'prestaciones_id');
    }
    //10.80.5.3 
    //39748
    protected $casts = [
        'caracter' => 'integer'
    ];

    public function Presupuesto()
    {
        return $this->belongsTo(Presupuestos::getClass(),'id' , 'prestaciones_pedidos_id');
    }
}
