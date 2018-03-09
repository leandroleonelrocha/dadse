<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $data;
    protected $form;
    protected $index;
    protected $repo;

    public function getIndex()
    {
        return view()->make($this->index)->with($this->data);
    }

    public function getNew()
    {

        return view()->make($this->form)->with($this->data);
    }

    public function postCreate(Request $request)
    {

        $this->validate($request, $this->validaciones, $this->mensajes);

        $this->repo->create($request->all());
        return redirect()->route($this->index)->with(['msg_success'=>'Registro creado Correctamente.']);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, $this->validaciones, $this->mensajes);

        $id = $this->route->getParameter('id');
        $model = $this->repo->find($id);

        $this->repo->edit($model, $request->all());

        return redirect()->route($this->index)->with(['msg_info'=>'Registro editado Correctamente.']);

    }


    public function getDelete()
    {
        $id = $this->route->getParameter('id');
        $this->repo->delete($id);

        return redirect()->route($this->index)->with(['msg_danger'=>'Registro eliminado Correctamente.']);
    }


    public function getEdit()
    {
        $id = $this->route->getParameter('id');
        $this->data['models'] = $this->repo->find($id);

        return view()->make($this->form)->with($this->data);
    }

    public function limpiarCaracteresEspeciales($string){
        $string = strtolower($string);

        $string = str_replace("á","a",$string);
        $string = str_replace("é","e",$string);
        $string = str_replace("í","i",$string);
        $string = str_replace("ó","o",$string);
        $string = str_replace("ú","u",$string);
        $string = str_replace("ñ","n",$string);

        return $string;
    }

    public function getCasoId(){
        return  session('casos_id');
    }
}
