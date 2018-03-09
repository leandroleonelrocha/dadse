<?php

namespace App\Entities;


class PrestacionesReferencias extends Entity
{
    protected $table        = 'prestaciones_referencias';
    protected $fillable     = ['prestaciones_id','kairos_detalle_id','kairos_descripcion','kairos_presentaciones_clave','kairos_presentaciones_detalle','kairos_presentaciones_importe','protesis_id'];
    
    public function Protesis()
    {
    	return $this->belongsTo(Protesis::getClass());
    }
    
}
