<?php

namespace App\Entities;

use App\Entities\User;
use League\Flysystem\Config;

class Presupuestos extends Entity
{
    protected $table        = 'presupuestos';
    protected $fillable     = ['proveedores_id','estado','adjudicado' ,'fecha_solicitud','users_id','total','precio_unitario','estado','caracter','observacion','observacion_adjudicacion','fecha_cierre','fecha_apertura_sobre','compulsa_id','prestaciones_pedidos_id'];




    public function Proveedores(){
        return $this->belongsTo(Proveedores::getClass());
    }

    public function Prestaciones()
    {
        return $this->belongsToMany(Prestaciones::getClass());
    }

    public function Compulsas(){
        return $this->belongsTo(Compulsas::class, 'compulsa_id');
    }

    public function getEstadoNombreAttribute()
    {
        return config('custom.presupuestos_estados.'.$this->attributes['estado']);
    }

    public function getCaracterAttribute($value)
    {
        return config('custom.presupuestos_caracter.'.$value);
    }

    public function Adelantos()
    {
        return $this->hasMany(PresupuestosAdelantos::class);
    }

    public function Pedido(){
        return $this->belongsTo(PrestacionesPedidos::getClass(), 'prestaciones_pedidos_id');
    }

    public function getFechaCierreAttribute()
    {
        return date('d-m-Y',strtotime($this->attributes['fecha_cierre']));
    }

    public function getHoraCierreAttribute()
    {
        return date('H:i',strtotime($this->attributes['fecha_cierre']));
    }

    public function setFechaCierreAttribute($value)
    {
        $this->attributes['fecha_cierre'] = date('Y-m-d h:i:s',strtotime($value));
    }


    public function getFechaAperturaSobreAttribute()
    {
        return date('d-m-Y',strtotime($this->attributes['fecha_apertura_sobre']));
    }


    public function getHoraAperturaSobreAttribute()
    {
        return date('H:m',strtotime($this->attributes['fecha_apertura_sobre']));
    }

    public function setFechaAperturaSobreAttribute($value)
    {
        $this->attributes['fecha_apertura_sobre'] = date('Y-m-d h:i:s',strtotime($value));
    }


}

