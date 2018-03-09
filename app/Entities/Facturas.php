<?php

namespace App\Entities;



class Facturas extends Entity
{
    protected $table        = 'facturas';
    protected $fillable     = ['fecha','total_facturado','file','proveedores_id','nro_factura','observaciones', 'casos_id', 'liquidaciones_id'];

    public function FacturasItems()
    {
        return $this->hasMany(FacturasItems::class);
    }

    public function firstDay(){
         return $this->hasMany(FacturasItems::class)->orderBy('fecha_entrega','ASC')->get();        
    }

    public function Caso(){
        return $this->belongsTo(Casos::class,'casos_id');
    }

    public function Proveedores()
    {
        return $this->belongsTo(Proveedores::class);
    }

    public function Autorizacion(){
        return $this->hasOne(AutorizacionDePagos::class);
    }

    public function getFechaAttribute()
    {
        return date('d-m-Y',strtotime($this->attributes['fecha']));
    }

    public function setFechaAttribute($value)
    {
        $this->attributes['fecha'] = date('Y-m-d h:i:s',strtotime($value));
    }

    public function Liquidaciones()
    {
        return $this->belongsTo(Liquidaciones::class);
    }

   
 

}
