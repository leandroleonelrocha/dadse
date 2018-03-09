<?php namespace App\Http\Repositories;

use App\Entities\EvaluacionSocial;
use App\Entities\Casos;
use App\Entities\Prestaciones;
use Auth;

class EvaluacionSocialRepo extends BaseRepo
{
    public function getModel()
    {
        return new EvaluacionSocial();
    }

    public function create($datos)
    {
        $datos['users_id'] = Auth::user()->id;
        $model =  parent::create($datos);
        $model->save();
        $prestacion = Prestaciones::find($datos['prestaciones_id']);
        $prestacion->estado = 13;
        $prestacion->save();

        return $model;
    }

    
    public function edit($model,$datos)
    {   

    	$model = parent::edit($model, $datos);
    	$model->save();
    }
    
}