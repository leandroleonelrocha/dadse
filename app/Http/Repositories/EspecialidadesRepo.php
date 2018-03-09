<?php namespace App\Http\Repositories;


use App\Entities\Especialidades;

class EspecialidadesRepo extends BaseRepo
{
    public function getModel()
    {
        return new Especialidades();
    }

    public function Delete($id = null)
    {
        $model = $this->model->find($id);
        $model->Medicos()->detach();
        $model->delete();
    }
}