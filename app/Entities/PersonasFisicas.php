<?php

namespace App\Entities;

use App\Entities\User;
use App\Http\Functions\InsolFunction;
use Carbon\Carbon;

class PersonasFisicas extends Entity
{
    protected $table        = 'personas_fisicas';
    protected $fillable     = ['fullname','nacionalidad','fecha_nacimiento','sexo','estado_civil','tipo_documento','documento','cuil','email','imagen','telefono_particular','telefono_movil','hogar_id','jefe_hogar'];
    //protected $primaryKey   = 'personaId';


    public function Hogar()
    {
        return $this->belongsTo(Hogar::class);
    }
    
    public function Casos(){
         return $this->hasMany(Casos::class);
    }    

    public function getEdad()
    {
    	return Carbon::createFromFormat('Y-m-d', $this->fecha_nacimiento)->age;
    	//return Carbon::createFromDate(str_replace("'","",$fecha))->age; // 43
    }

    public function FichaObservacion(){
        return $this->hasMany(FichasPersonasFisicas::class);
    }

    public function setFechaNacimientoAttribute($value)
    {
        $this->attributes['fecha_nacimiento'] = date('Y-m-d',strtotime($value));
    }

 
    public function getDisponibleMensualAttribute()
    {
        $mesPasado = date('m',strtotime('-1 month',time()));
        $month = date('m');
        $year = date('Y');
        $max = CuentaCorriente::first()->dia_fin_mes;
        $personaFisicaId = $this->attributes['id'];

        // CON LIMITE EN LA CUENTA CORRIENTE
       // $disponible = AyudaDirecta::whereBetween('created_at',[ $year.'-'.$mesPasado. '-' . $max, $year.'-'.$month.'-'.$max])

        $disponible = AyudaDirecta::whereBetween('created_at',[ $year.'-'.$month. '-1' , $year.'-'.$month.'-'.date('t')])

            ->whereHas('Casos',function($q) use ($personaFisicaId)
            {
                $q->where('personas_fisicas_id',$personaFisicaId);
            })
            ->get()->SUM('importe_autorizado');

        return $disponible ;
    }

    public function getEditDisponibleMensualAttribute($ayuda_id){
        $mesPasado = date('m',strtotime('-1 month',time()));
        $month = date('m');
        $year = date('Y');
        $max = CuentaCorriente::first()->dia_fin_mes;
        $personaFisicaId = $this->attributes['id'];

        // CON LIMITE EN LA CUENTA CORRIENTE
        // $disponible = AyudaDirecta::whereBetween('created_at',[ $year.'-'.$mesPasado. '-' . $max, $year.'-'.$month.'-'.$max])->where('id','!=',$ayuda_id)
         $disponible = AyudaDirecta::whereBetween('created_at',[ $year.'-'.$month. '-1' , $year.'-'.$month.'-'.date('t')])->where('id','!=',$ayuda_id)

        ->whereHas('Casos',function($q) use ($personaFisicaId)
            {
                $q->where('personas_fisicas_id',$personaFisicaId);
            })
            ->get()->SUM('importe_autorizado');

        return $disponible ;
    }

    public function getInsolInfoAttribute()
    {
        $insolFunction = new InsolFunction();

        $insolFunction->getPersona($this->id);

        return ($insolFunction->getHttpCode() != 200) ? null : $insolFunction->getResultado()->result;

    }

}
