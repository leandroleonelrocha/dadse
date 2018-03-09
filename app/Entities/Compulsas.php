<?php

namespace App\Entities;



class Compulsas extends Entity
{
    protected $table        = 'compulsas';
    protected $fillable     = ['fecha_solicitud','fecha_cierre','fecha_apertura_sobre'];

    public function getFechaCierreAttribute()
    {
        return date('d-m-Y',strtotime($this->attributes['fecha_cierre']));
    }

    public function getHoraCierreAttribute()
    {
        return date('H:i',strtotime($this->attributes['fecha_cierre']));
    }

    public function setFechaCierreAttribute($value)
    {
        $this->attributes['fecha_cierre'] = date('Y-m-d h:i:s',strtotime($value));
    }


    public function getFechaAperturaSobreAttribute()
    {
        return date('d-m-Y',strtotime($this->attributes['fecha_apertura_sobre']));
    }


    public function getHoraAperturaSobreAttribute()
    {
        return date('H:m',strtotime($this->attributes['fecha_apertura_sobre']));
    }

    public function setFechaAperturaSobreAttribute($value)
    {
        $this->attributes['fecha_apertura_sobre'] = date('Y-m-d h:i:s',strtotime($value));
    }
    
    public function Presupuestos(){
        return $this->hasMany(Presupuestos::getClass(), 'compulsa_id');
    }
}
