<?php namespace App\Http\Repositories;


use App\Entities\CuentaCorriente;

class CuentaCorrienteRepo extends BaseRepo
{
    public function getModel()
    {
        return new CuentaCorriente();
    }

    public function total($dia){
        $dia = date("j");
        return $this->model->where('dia_inicio_mes','>=', $dia)->where('dia_fin_mes','<=',$dia)->get();

    }


}