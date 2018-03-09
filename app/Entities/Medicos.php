<?php

namespace App\Entities;



class Medicos extends Entity
{
    protected $table        = 'medicos';
    protected $fillable     = ['nombre', 'apellido', 'dni', 'matricula', 'matricula_tipo','tipo_matricula','user_id'];

    public function Especialidades()
    {
        return $this->belongsToMany(Especialidades::class, 'medicos_especialidades');
    }


    public function getFullNameAttribute()
    {
        return $this->attributes['apellido'] .' '. $this->attributes['nombre'];
    }

    public function tipoMatricula()
    {
        return config('data.tipo_matricula.'.$this->attributes['tipo_matricula']);
    }

    public function AltoCostoMedicos()
    {
        return $this->hasMany(AltoCostoMedicos::class);
    }
    
    public function getEspecialidadesIdAttribute()
    {
        return $this->Especialidades->lists('id')->toArray();
    }

    public function Informes()
    {
        return $this->hasMany(PrestacionesInformes::class);
    }
    
}
