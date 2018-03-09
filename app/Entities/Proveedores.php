<?php

namespace App\Entities;

use App\Entities\User;

class Proveedores extends Entity
{
    protected $table        = 'proveedores';
    protected $fillable     = ['nombre','sedes_id','razon_social','cuit','tel','contacto','logo','direccion','ciudad','provincia','cp','ayuda_directa', 'domicilio_fiscal'];
    

    public function Presupuestos(){
        return $this->hasMany(Presupuestos::getClass());
    }

    public function AyudaDirectaProveedores(){
        return $this->belongsToMany(AyudaDirectaProveedores::getClass(), 'ayuda_directa_proveedores', 'proveedores_id', 'ayuda_directa_id');
    }

    public function PresupuestosPendientes(){
        return  $this->hasMany(Presupuestos::getClass())->where('estado',7);

    }

    public function Tipos()
    {
        return $this->belongsToMany(ProveedoresTipos::class,'proveedores_proveedores_tipos');
    }

    public function getProveedoresTiposIdAttribute()
    {
        return $this->Tipos->lists('id')->toArray();
    }

     public function Email(){
        return $this->hasMany(ProveedoresEmail::getClass());
    }

    public function EmailLists()
    {
        return $this->Email()->lists('descripcion')->toArray();
    }

    public function Facturas()
    {
        return $this->hasMany(Facturas::class)->with('FacturasItems');
    }

    public function Liquidaciones()
    {
        return $this->hasMany(Liquidaciones::class);
    }

    public function getFullNameAttribute()
    {
        return $this->razon_social . ' - ' . $this->direccion ;
    }


    public function Compulsas(){
        return $this->hasMany(Compulsas::class);
    }
}
