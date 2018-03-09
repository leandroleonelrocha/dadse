<?php

namespace App\Entities;


class Municipios extends Entity
{
    protected $table        = 'municipios';
    protected $fillable     = ['name','provincia_id'];




    public function Localidades()
    {
        return $this->hasMany(Localidades::class ,'municipio_id');
    }



}
