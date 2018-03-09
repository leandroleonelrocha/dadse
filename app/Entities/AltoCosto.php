<?php

namespace App\Entities;



class AltoCosto extends Entity
{
    protected $table        = 'alto_costo';
    protected $fillable     = ['estado','fecha','prestaciones_informes_id','prestaciones_id'];

    
    

    public function Prestaciones()
    {
        return $this->belongsTo(Prestaciones::class, 'prestaciones_id');
    }

    

}
