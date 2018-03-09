<?php
namespace App\Http\Repositories;

use App\Entities\PrestacionesInformes;
use Auth;

class PrestacionesInformesRepo extends BaseRepo
{
    public function getModel()
    {
        return new PrestacionesInformes();
    }

    public function listadoTotal()
    {
        return $this->model->all();
    }

    public function create($data){
        
        $this->model->create($data);
    }
}