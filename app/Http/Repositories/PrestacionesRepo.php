<?php
namespace App\Http\Repositories;

use App\Entities\Prestaciones;


class PrestacionesRepo extends BaseRepo
{
    public function getModel()
    {
        return new Prestaciones();
    }

    public function listadoTotal()
    {
        return $this->model->all();
    }

    public function create($data){

        return ($this->model->create($data));

    }

    public function cambiarEstado($id , $estado)
    {
        $model = $this->model->find($id);
        $model->estado = $estado;
        $model->save();

    }
}