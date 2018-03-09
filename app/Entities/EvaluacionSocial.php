<?php

namespace App\Entities;


class EvaluacionSocial extends Entity
{
    protected $table        = 'evaluacion_social';
    protected $fillable     = ['otra_negativa','coparticipacion_provincial','negativa_provincial','negativa_municipal','observaciones','certificacion_negativa','obra_social','posee_obra_social','institucion','direccion_numero','direccion','lic_trabajo_social_interviniente','informe_social','consideraciones','valoracion_profesional','prestaciones_id','registra_afiliacion_salud','cobertura_provincial','matricula','users_id'];

    
    public function Prestacion()
    {
        return $this->belongsTo(Prestaciones::class, 'prestaciones_id');
    }

     public function getCreatedAtAttribute(){
        return date("d/m/Y",strtotime($this->attributes['created_at']));
    }

}	
