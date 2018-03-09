<?php

namespace App\Entities;



class SolicitudesInformes extends Entity
{
    protected $table        = 'solicitudes_informes';
    protected $fillable     = ['solicitudes_id','users_id','fecha','diagnostico','hospital_tratante','medico_tratante','matricula','tipo_matricula','observaciones'];

    public function AyudaDirecta()
    {
        return $this->belongsTo(AyudaDirecta::getClass());
    }
    
}
