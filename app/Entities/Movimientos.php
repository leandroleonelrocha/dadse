<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Movimientos extends Model
{
    protected $fillable =  ['entity_type','entity_id','estado_movimiento', 'users_id'];

    public function entity(){

        return $this->morphTo();
    }


    public function usuario(){
        return $this->belongsTo(User::class,'users_id');
    }

    public function getCreatedAtAttribute(){
        return date("d/m/Y",strtotime($this->attributes['created_at']));
    }

    public function getHora(){
    	return date("H:i",strtotime($this->attributes['created_at']));
    }

}
