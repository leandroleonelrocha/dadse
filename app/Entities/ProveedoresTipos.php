<?php

namespace App\Entities;



class ProveedoresTipos extends Entity
{
    protected $table        = 'proveedores_tipos';
    protected $fillable     = ['nombre'];

    public function Proveedores()
    {
        return $this->belongsToMany(Proveedores::class,'proveedores_proveedores_tipos');
    }

}
