<?php
/**
 * Created by PhpStorm.
 * User: llrocha
 * Date: 26/08/2015
 * Time: 12:07 PM
 */
namespace App\Http\Repositories;
use App\Entities\Proveedores;
use App\Entities\ProveedoresEmail;
use Auth; 

class ProveedoresRepo extends BaseRepo {

    public function getModel()
    {
        return new Proveedores();
    }

    public function create($datos)
    {   
        
        $model =  parent::create($datos);
        $model->Tipos()->attach($datos['proveedores_tipos_id']);
        
        
        foreach ($datos['mail'] as $value) {
            $datos['descripcion'] = $value;
            $datos['proveedores_id']           = $model->id;
            ProveedoresEmail::create($datos);
        }
           
    }

    public function ayuda(){
        return Proveedores::where('ayuda_directa',1)->where('sedes_id', Auth::user()->sedes_id)->get();
    }

    public function edit($model, $datos)
    {
        $model =  parent::edit($model, $datos);
        $model->Tipos()->sync($datos['proveedores_tipos_id']);
        $model->Email()->delete();

        if(isset($datos['mail'])){
            foreach ($datos['mail'] as $value) {
                $datos['descripcion'] = $value;
                $datos['proveedores_id']           = $model->id;
                ProveedoresEmail::create($datos);
            }
        }

    }

    public function Delete($id = null)
    {
        $model = $this->model->find($id);
        $model->Tipos()->detach();
        $model->Email()->delete();
        $model->delete();
    }

}