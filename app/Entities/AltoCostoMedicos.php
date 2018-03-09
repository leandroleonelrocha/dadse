<?php

namespace App\Entities;



class AltoCostoMedicos extends Entity
{
    protected $table        = 'alto_costo_medicos';
    protected $fillable     = ['alto_costo_id','medicos_id','fecha_envio','fecha_recepcion','estado'];


    public function Medicos()
    {
        return $this->belongsTo(Medicos::class);
    }

    public function AltoCosto()
    {
        return $this->belongsTo(AltoCosto::class);
    }
}
