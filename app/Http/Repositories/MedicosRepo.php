<?php namespace App\Http\Repositories;


use App\Entities\Medicos;
use Auth;
class MedicosRepo extends BaseRepo
{
    public function getModel()
    {
        return new Medicos();
    }


    public function create($datos)
    {

        $datos['user_id'] = Auth::user()->id;
        $model =  parent::create($datos);
        $model->Especialidades()->attach($datos['especialidades_id']);
        
    }

    public function edit($model, $datos)
    {   
        
        $model =  parent::edit($model, $datos);
       
        $model->Especialidades()->sync($datos['especialidades_id']);
    }

    public function Delete($id = null)
    {
        $model = $this->model->find($id);
        $model->Especialidades()->detach();
        $model->delete();
    }



}