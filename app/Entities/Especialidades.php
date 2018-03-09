<?php

namespace App\Entities;



class Especialidades extends Entity
{
    protected $table        = 'especialidades';
    protected $fillable     = ['nombre'];

    public function Medicos()
    {
        return $this->belongsToMany(Medicos::class,'medicos_especialidades');
    }

}
