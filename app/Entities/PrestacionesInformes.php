<?php

namespace App\Entities;

use App\Entities\User;

class PrestacionesInformes extends Entity
{
    protected $table        = 'prestaciones_informes';
    protected $fillable     = ['prestaciones_id','diagnostico','hospitales_id','medico_tratante','matricula','tipo_matricula','tipo_diagnostico','observaciones','medicos_id','ciclos'];

    public function Hospitales()
    {
        return $this->belongsTo(Hospitales::getClass());
    }

    public function Medicos(){
    	return $this->belongsTo(Medicos::getClass());	
    }

        public function Prestaciones()
    {
        return $this->belongsTo(Prestaciones::class);
    }

}
