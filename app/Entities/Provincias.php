<?php

namespace App\Entities;


class Provincias extends Entity
{
    protected $table        = 'provincias';
    protected $fillable     = ['name','region_id'];

    public function Municipios()
    {
        return $this->hasMany(Municipios::Class,'provincia_id');
    }

}
