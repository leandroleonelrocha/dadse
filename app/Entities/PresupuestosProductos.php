<?php

namespace App\Entities;

use App\Entities\User;

class PresupuestosProductos extends Entity
{
    protected $table        = 'presupuestos_productos';
    protected $fillable     = ['prestaciones_productos_id','presupuestos_id'];



}
