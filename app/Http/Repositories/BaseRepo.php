<?php
/**
 * Created by PhpStorm.
 * User: mbarrios
 * Date: 3/7/15
 * Time: 12:39
 */

namespace App\Http\Repositories;
use App\Entities\Persona;

abstract class BaseRepo {

    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public abstract function getModel();

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($datos)
    {
        return $this->model->create($datos);
    }

    public function edit($model, $datos)
    {
        $model->fill($datos);
        $model->save();

        return $model;
    }

    public function listsCombo($data, $id)
    {
        return $this->model->lists($data, $id);
    }

    public function Delete($id = null)
    {
        $this->model->find($id)->delete();
    }

    public function ultimo()
    {
        return  $this->model->orderBy('id', 'desc')->first();
      
    }

    public function sortBy(){
        return  $this->model->orderBy('id', 'desc')->get();
    }
   

}