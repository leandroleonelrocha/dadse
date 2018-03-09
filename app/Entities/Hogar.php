<?php

namespace App\Entities;



class Hogar extends Entity
{
    protected $table        = 'hogar';
    protected $fillable     = ['provincia','ciudad','partido','municipio','codigo_postal','calle_slug','calle_intersecciones','numero','barrio','paraje','manzana','piso','dpto','torre'];


}
