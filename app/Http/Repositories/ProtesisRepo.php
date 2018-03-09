<?php namespace App\Http\Repositories;


use App\Entities\Protesis;

class ProtesisRepo extends BaseRepo
{
    public function getModel()
    {
        return new Protesis();
    }


    public function search($search)
    {
    	return $this->model->where('nombre','like', '%'. $search . '%')->get();
    } 	 
}