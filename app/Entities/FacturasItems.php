<?php

namespace App\Entities;



class FacturasItems extends Entity
{
    protected $table        = 'facturas_items';
    protected $fillable     = ['cantidad','precio_unitario','subtotal','detalle','facturas_id','fecha_entrega'];

    public function Facturas()
    {
        return $this->belongsTo(Facturas::class);
    }

    public function Prestaciones()
    {
        return $this->belongsToMany(Prestaciones::class,'prestaciones_facturas_items');
    }

    public function getFechaEntregaAttribute()
    {
        return date('d-m-Y',strtotime($this->attributes['fecha_entrega']));
    }

    public function setFechaEntregaAttribute($value)
    {
        $this->attributes['fecha_entrega'] = date('Y-m-d h:i:s',strtotime($value));
    }

    
}
