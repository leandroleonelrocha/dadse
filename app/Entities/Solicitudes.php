<?php

namespace App\Entities;

use App\Entities\User;

class Solicitudes extends Entity
{
    protected $table        = 'solicitudes';
    protected $fillable     = ['beneficiario_id','clasificacion_id','beneficiario_tipo','solicitud_fecha_alta','caso_observaciones','estado'];
    //protected $primaryKey   = 'solicitudId';

    // Relaciones
    public function prestaciones()
    {
        return $this->hasMany(Prestaciones::getClass());
    }


    public function PersonasFisicas(){

        return $this->hasOne(PersonasFisicas::getClass(),'id','beneficiario_id');
    }


    public function getEstadoAttribute()
    {
        if($this->attributes['estado'] == 1)
            return 'Iniciada';

        if($this->attributes['estado'] == 2)
            return 'En Proceso';

        if($this->attributes['estado'] == 3)
            return 'Finalizada';

    }


    public function movimientos(){

        return $this->morphMany(Movimientos::class, 'entity');
    }

    public function AyudaDirecta(){
        return $this->hasMany(AyudaDirecta::getClass());
    }
    
    public function SolicitudesInformes(){
        return $this->hasOne(SolicitudesInformes::getClass());
    }

}
