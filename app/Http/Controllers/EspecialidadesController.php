<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Route;
use App\Http\Repositories\EspecialidadesRepo as Repo;

class EspecialidadesController extends Controller
{
    protected $route;

    public function __construct( Route $route , Repo $repo)
    {
        $this->route            =  $route;
        $this->repo             =  $repo;

        $this->data['seccion']  = 'Especialidades de Médicos';
        $this->index            = 'especialidades.index';
        $this->form             = 'especialidades.form';
        $this->validaciones     = $this->validaciones();
        $this->mensajes         = $this->mensajes();
        
    }


    public function getIndex()
    {
        $this->data['model']    = $this->repo->all();

        return parent::getIndex();
    }


    public function validaciones(){

        return [ 
            'nombre'  =>  'required',
        ];

    }


    public function mensajes(){
       
        return [
            'nombre.required' => 'El campo :attribute es requirido.',
        ];

    }

}
