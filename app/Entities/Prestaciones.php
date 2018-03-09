<?php

namespace App\Entities;
use App\Entities\User;


class Prestaciones extends Entity
{
    protected $table        = 'prestaciones';
    protected $fillable     = ['expediente','resolucion','casos_id','cantidad','categorias_id','producto','descripcion','estado','importe_asignado','unidad_medida','presupuesto_adjudicado','observaciones', 'ayuda_directa_id', 'is_facturado'];

    public function Ayuda(){

        return $this->belongsTo(AyudaDirecta::getClass(), 'ayuda_directa_id');
    }

    public function Pedidos(){
        return $this->hasMany(PrestacionesPedidos::getClass());
    }

    public function AyudaDirecta(){
    	return $this->hasMany(AyudaDirecta::getClass());
    }

    public function AltoCosto(){
        return $this->hasMany(AltoCosto::getClass());
    }

    public function Casos(){
        return $this->belongsTo(Casos::getClass());
    }

    public function Presupuestos()
    {
        return $this->belongsToMany(Presupuestos::getClass())->withPivot('id');
    }

    public function PresupuestoAdjudicado()
    {
        return $this->belongsTo(Presupuestos::getClass(),'presupuesto_adjudicado');
    }

    public function getEstadoNombreAttribute()
    {
        return config('custom.prestaciones_estados.'.$this->attributes['estado']);
    }

    public function FacturasItems()
    {
        return $this->belongsToMany(FacturasItems::class,'prestaciones_facturas_items');
    }

    public function EvaluacionSocial()
    {
        return $this->hasOne(EvaluacionSocial::getClass());
    }

    public function getProductos(){

        return $this->producto .', '. $this->unidad_medida .', Cantidad:' . $this->cantidad ;
    }

    public function Informe(){
        return $this->hasOne(PrestacionesInformes::getClass());
    }
}

