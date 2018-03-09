<?php

namespace App\Entities;


class Hospitales extends Entity
{
    protected $table        = 'hospitales';
    protected $fillable     = ['descripcion','ciudad','provincia'];

    public function getFullNameAttribute()
    {
        return $this->attributes['descripcion'] .', '. $this->attributes['ciudad'];
    }


}
