<?php namespace App\Http\Repositories;


use App\Entities\ProveedoresTipos;

class ProveedoresTiposRepo extends BaseRepo
{
    public function getModel()
    {
        return new ProveedoresTipos();
    }

    public function Delete($id = null)
    {
        $model = $this->model->find($id);
        $model->Proveedores()->detach();
        $model->delete();
    }
}