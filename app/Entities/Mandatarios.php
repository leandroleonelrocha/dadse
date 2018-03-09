<?php

namespace App\Entities;

use App\Entities\User;
use App\Http\Functions\InsolFunction;
use Carbon\Carbon;

class Mandatarios extends Entity
{
    protected $table        = 'mandatarios';
    protected $fillable     = ['casos_id','fullname','nacionalidad','fecha_nacimiento','sexo','estado_civil','tipo_documento','documento','cuil','email','imagen','telefono_particular','telefono_movil','hogar_id','jefe_hogar'];
    //protected $primaryKey   = 'personaId';




    public function getEdad()
    {
    	return Carbon::createFromFormat('Y-m-d', $this->fecha_nacimiento)->age;
    	//return Carbon::createFromDate(str_replace("'","",$fecha))->age; // 43
    }

   



}
