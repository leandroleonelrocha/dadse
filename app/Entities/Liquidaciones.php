<?php

namespace App\Entities;
use DB;

class Liquidaciones extends Entity
{
    protected $table        = 'liquidaciones';
    protected $fillable     = ['fecha_liquidacion','nro_liquidacion_proveedor','nro_liquidacion_interna','nro_resolucion','nro_expediente','nro_if','nro_anexo','total','proveedores_id',
    'nro_if_anexo','nro_expediente_electronico','nro_expediente_edadse','if_proyecto_resolucion','if_providencia_asubse','if_providencia_resolucion'];


    public function Facturas()
    {
        return $this->hasMany(Facturas::class);
    }

    public function Proveedores()
    {
        return $this->belongsTo(Proveedores::class);
    }


     public function minFecha(){

        
        return DB::table('liquidaciones')
            ->where('liquidaciones.id', '=', $this->id)
            ->join('facturas', 'facturas.liquidaciones_id','=', 'liquidaciones.id')
            ->join('facturas_items', 'facturas_items.facturas_id', '=', 'facturas.id')
            ->orderBy('facturas_items.fecha_entrega', 'asc')
            ->select('facturas_items.fecha_entrega as fecha_desde')
            ->first();
    

    }

    public function maxFecha(){
        return DB::table('liquidaciones')
            ->where('liquidaciones.id', '=', $this->id)
            ->join('facturas', 'facturas.liquidaciones_id','=', 'liquidaciones.id')
            ->join('facturas_items', 'facturas_items.facturas_id', '=', 'facturas.id')
            ->orderBy('facturas_items.fecha_entrega', 'desc')
            ->select('facturas_items.fecha_entrega as fecha_hasta')
            ->first();

    }
    

}
