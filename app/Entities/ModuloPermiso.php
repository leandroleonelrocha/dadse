<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Modulo;

class ModuloPermiso extends Entity
{
    protected $table        = 'modulo_permiso';
    // protected $fillable = ['name', 'email', 'password'];
    // protected $hidden   = ['password', 'remember_token'];

    public function Modulo()
    {
        return $this->belongsTo(Modulo::getClass());
    }

}
