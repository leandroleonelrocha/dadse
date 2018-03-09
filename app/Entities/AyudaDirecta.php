<?php

namespace App\Entities;
use Auth;
use App\Entities\User;

class AyudaDirecta extends Entity
{
    protected $table        = 'ayuda_directa';
    protected $fillable     = ['cant_recetas', 'cant_medicamentos', 'cant_insumos', 'importe_autorizado','prestaciones_informes_id', 'casos_id', 'users_id'];

    public function Prestaciones(){

        return $this->hasMany(Prestaciones::getClass(), 'ayuda_directa_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\Entities\User', 'users_id');
    }

    public function PrestacionesInformes()
    {
        return $this->belongsTo(PrestacionesInformes::getClass());
    }


    public function AyudaDirectaProveedores(){
        return $this->belongsToMany(Proveedores::getClass(), 'ayuda_directa_proveedores','ayuda_directa_id', 'proveedores_id');
    }

    public function Proveedores()
    {
        return Proveedores::where('ayuda_directa', 1)->where('sedes_id',Auth::user()->sedes_id)->get();
    }

    public function Casos()
    {
        return $this->belongsTo(Casos::getClass());
    }


    public function getCreatedAtAttribute(){
        return date("d-m-Y H:i",strtotime($this->attributes['created_at']));
    }

    public function getUpdatedAtAttribute(){
        return date("d-m-Y H:i",strtotime($this->attributes['updated_at']));
    }


    public function fecha_vencimiento(){
        //date('d-m-Y', strtotime($fecha . "+1 days"));
        return date('d-m-Y', strtotime($this->attributes['updated_at']. '+14 day'));
    }

    
    public function getEntreFechas(){
       //fecha emitad sea igual o mayor a la emitida
       //fecha emitiad sea menor o igual a la vencimiento 
       $fecha_actual  = date('Y-m-d');  
       $fecha_emitiad = date('Y-m-d' ,strtotime($this->attributes['updated_at']));
       $vencimiento   = date('Y-m-d', strtotime($this->attributes['updated_at']. '+14 day'));
     
       if($fecha_actual >= $fecha_emitiad && $fecha_actual <= $vencimiento){
           return 1;
       }
       else{
            return 0;
       }


    }
    
 

}
