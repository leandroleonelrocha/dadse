<?php

namespace App\Entities;


class Protesis extends Entity
{
    protected $table        = 'protesis';
    protected $fillable     = ['nombre','descripcion','estado','categoria', 'importe'];
    

   	public function getFullNameAttribute()
    {
        return $this->nombre . ' - ' . $this->descripcion . ' (VALOR: $' . $this->importe . ')';
    }
    
}
