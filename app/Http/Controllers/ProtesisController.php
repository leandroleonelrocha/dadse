<?php
namespace App\Http\Controllers;

use App\Http\Functions\ProtesisFunction;
use Illuminate\Routing\Route;
use App\Http\Repositories\ProtesisRepo as Repo;
use Illuminate\Http\Request;

class ProtesisController extends Controller
{
    protected $protesisFunction;
    protected $route;
    protected $unidb;


    public function __construct(ProtesisFunction $protesisFunction, Route $route, Repo $repo){

        $this->protesisFunction = $protesisFunction;
        $this->route = $route;

        $this->data['seccion']      = 'Protesis';
        $this->index                = 'protesis.index';
        $this->form                 = 'protesis.form';
        $this->repo                 = $repo;
        $this->validaciones         = $this->validaciones();
        $this->mensajes             = $this->mensajes();
        $this->data['categorias']   = config('custom.protesis_categorias');


    }

    public function getIndex()
    {   
        $this->data['model']             = $this->repo->all();
        return parent::getIndex();
    }

    public function getSearch(Request $request, $search = null){


        $search =  $this->repo->search($request->get('search'));
       
        return response()->json($search);

       // $this->protesisFunction->buscarProtesis($search);
       //return response()->json($this->protesisFunction->getResultado());
    }

    public function validaciones(){

        return [ 

            'nombre'        => 'required',
            'descripcion'   => 'required',
            'estado'        => 'required',
            'categoria'     => 'required',
            'importe'       => 'required'  

        ];
    }


    public function mensajes(){
       
        return [
            
            'nombre.required'        => 'El campo :attribute es requirido.',
            'descripcion.required'   => 'El campo :attribute es requirido.',
            'estado.required'        => 'El campo :attribute es requirido.',
            'categoria.required'     => 'El campo :attribute es requirido.',
            'importe.required'       => 'El campo :attribute es requirido.',
        ];

    }



}
