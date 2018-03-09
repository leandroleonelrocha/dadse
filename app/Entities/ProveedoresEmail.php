<?php

namespace App\Entities;

use App\Entities\User;

class ProveedoresEmail extends Entity
{
    protected $table        = 'proveedores_email';
    protected $fillable     = ['descripcion','proveedores_id'];
    

    public function Proveedores(){
        return $this->belongsTo(Proveedores::getClass());
    }


   
}
