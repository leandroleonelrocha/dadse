<?php

namespace App\Entities;



class Modulo extends Entity
{
    protected $table        = 'modulo';
   // protected $fillable = ['name', 'email', 'password'];
   // protected $hidden   = ['password', 'remember_token'];

    public function ModuloPermiso()
    {
        return $this->hasMany(ModuloPermiso::getClass());
    }

}
