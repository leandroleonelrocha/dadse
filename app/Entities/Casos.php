<?php

namespace App\Entities;


class Casos extends Entity
{
    protected $table = 'casos';

    protected $fillable = ['user_id', 'user_full_name', 'user_user_name', 'estado_id', 'estado_nombre', 'estado_slug', 'observaciones', 'destinatario_type', 'destinatario_id', 'canal_id', 'canal_nombre', 'personas_fisicas_id', 'organizaciones_id', 'ayuda_directa', 'alto_costo', 'numero_expediente'];

    // Relaciones
    public function prestaciones(){
        return $this->hasMany(Prestaciones::getClass());
    }

    public function AyudaDirecta(){
        return $this->hasMany(AyudaDirecta::getClass());
    }

    public function Facturaciones(){
        return $this->hasMany(Facturas::getClass(),'casos_id');
    }

    public function PersonasFisicas(){ 
        return $this->belongsTo(PersonasFisicas::getClass());
    }

    public function getEstadoAttribute()
    {
        if ($this->attributes['estado'] == 1)
            return 'Iniciada';

        if ($this->attributes['estado'] == 2)
            return 'En Proceso';

        if ($this->attributes['estado'] == 3)
            return 'Finalizada';
    }

    public function getEstadoTypeAttribute()
    {
        switch ($this->estado_nombre) {
            case 'Iniciado':
                return 'primary';
                break;

            case 'Pendiente':
                return 'warning';
                break;

            case 'Finalizado':
                return 'success';
                break;

            case 'Anulado':
                return 'danger';
                break;    
                
            default:
                return 'default';
        }
    }

    public function movimientos(){
        return $this->morphMany(Movimientos::class, 'entity');
    }

    public function SolicitudesInformes(){
        return $this->hasOne(SolicitudesInformes::getClass());
    }

    public function Documentos(){
        return $this->hasMany(Documentos::getClass());
    }

    public function getFechaActual()
    {
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $hora = date("H:i",time());
        return $hora;
    }

    public function getImporteTotalAyudasDirectas()
    {
        /*
        $total = 0;
        foreach($this->Facturaciones  as  $factura)
        {
             $total +=  $factura->FacturasItems->sum('precio_unitario');

        }
        return $this->AyudaDirecta()->sum('importe_autorizado') - $total;
        */
        return $this->AyudaDirecta()->sum('importe_autorizado');
    }

    public function Mandatarios()
    {
        return $this->hasMany(Mandatarios::class);
    }
}
