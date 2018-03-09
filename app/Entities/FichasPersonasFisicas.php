<?php

namespace App\Entities;


class FichasPersonasFisicas extends Entity
{
    protected $table        = 'fichas_personas_fisicas';
    protected $fillable     = ['salud','vivienda','situacion_laboral','conclusiones', 'personas_fisicas_id', 'user_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

 	public function PersonasFisicas()
    {
        return $this->belongsTo(PersonasFisicas::class);
    }
       
}
