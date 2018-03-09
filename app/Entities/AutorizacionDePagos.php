<?php

namespace App\Entities;



class AutorizacionDePagos extends Entity
{
    protected $table        = 'autorizacion_de_pagos';
    protected $fillable     = ['remito_foja','factura_foja','forma_pago','troqueles_foja','facturas_id'];

    public function Facturas()
    {
        return $this->belongsTo(Facturas::class);
    }

    
}
