<?php

namespace App\Entities;


class PrestacionesFacturasItems extends Entity
{
    protected $table        = 'prestaciones_facturas_items';
    protected $fillable     = ['prestaciones_id','facturas_items_id'];

    
}
