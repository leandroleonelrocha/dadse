<?php
namespace App\Http\Controllers;


use App\Http\Repositories\EspecialidadesRepo;
use Illuminate\Routing\Route;
use App\Http\Repositories\MedicosRepo as Repo;
use App\Http\Repositories\UserRepo;
use Auth;

class MedicosController extends Controller
{
    protected $route;
    protected $especialidadesRepo;
    protected $usersRepo;
    protected $validaciones;


    public function __construct( Route $route , Repo $repo, EspecialidadesRepo $especialidadesRepo, UserRepo $usersRepo)
    {
        $this->route            =  $route;
        $this->data['seccion']  = 'Medicos';
        $this->index            = 'medicos.index';
        $this->form             = 'medicos.form';
        $this->repo             = $repo;

        $this->data['especialidades']    = $especialidadesRepo->listsCombo('nombre','id');
      
        $this->validaciones = $this->validaciones();
        $this->mensajes     = $this->mensajes();
    }


    public function getIndex()
    {   
        $this->data['model']             = $this->repo->all();
        return parent::getIndex();
    }
    

    public function getDetalle()
    {   

        $id = $this->route->getParameter('id');

        $this->data['models'] = $this->repo->find($id);
    
        return view()->make('medicos.detalle')->with($this->data);
    }

    

    public function validaciones(){

        return [ 

            'dni'             => 'required|unique:medicos,dni,'.$this->route->getParameter('id'),
            'nombre'          => 'required',
            'apellido'        => 'required',
            'tipo_matricula'  => 'required',
            'matricula'       => 'required|unique:medicos,matricula,'.$this->route->getParameter('id'), 
        ];
    }


    public function mensajes(){
       
        return [
            'dni.required'            => 'El campo :attribute es requirido.',
            'nombre.required'         => 'El campo :attribute es requirido.',
            'apellido.required'       => 'El campo :attribute es requirido.',
            'tipo_matricula.required' => 'El campo :attribute es requirido.',
            'matricula.required'      => 'El campo :attribute es requirido.',
            'matricula.unique'        => 'El número de matricula ya está en uso.',
            'dni.unique'             => 'El número de dni ya está en uso.'
        ];

    }

}
