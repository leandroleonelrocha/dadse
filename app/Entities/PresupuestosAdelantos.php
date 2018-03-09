<?php

namespace App\Entities;

use App\Entities\User;

class PresupuestosAdelantos extends Entity
{
    protected $table        = 'presupuestos_adelantos';
    protected $fillable     = ['cantidad','fecha','presupuestos_id','users_id'];



    public function User()
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function Presupuestos()
    {

    	return $this->belongsTo(Presupuestos::class, 'presupuestos_id');
    }
}
