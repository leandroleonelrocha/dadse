<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Route;
use App\Http\Repositories\UserRepo as Repo;
use App\Http\Repositories\EspecialidadesRepo;
use App\Http\Repositories\ProveedoresTiposRepo;
use App\Http\Repositories\MedicosRepo;
use App\Http\Repositories\ProveedoresRepo;
use Bican\Roles\Models\Role;
use Bican\Roles\Models\Permission;
use App\Http\Functions\ProtesisFunction;

class UsersController extends Controller {

    protected $route;
    protected $medicosRepo;
    protected $proveedoresRepo;
    protected $rol;
    protected $sedesFunction;

    public function __construct(Role $rol, Route $route , Repo $repo, ProtesisFunction $sedesFunction,  EspecialidadesRepo $especialidadesRepo, ProveedoresTiposRepo $tipos, MedicosRepo $medicosRepo, ProveedoresRepo $proveedoresRepo)
    {
        $this->route                     = $route;
        $this->data['seccion']           = 'User';
        $this->index                     = 'users.index';
        $this->form                      = 'users.form';
        $this->repo                      = $repo;
        $this->data['especialidades']    = $especialidadesRepo->listsCombo('nombre','id');
        $this->data['tipos']             = $tipos->listsCombo('nombre','id');
        $this->data['roles']             = $rol->orderBy('name', 'ASC')->lists('name','id');  
        $this->data['roles_edit']        = $rol->all();
        $this->medicosRepo               = $medicosRepo;
        $this->proveedoresRepo           = $proveedoresRepo;
        $this->validaciones              = $this->validaciones();
        $this->mensajes                  = $this->mensajes();
        $sedesFunction->call(env('API_MDS_URL').'/unidb/sedes/?search='.'&limit=500');
        $this->data['sedes'] = $sedesFunction->getResultado()->results;
        
    }
    public function index()
    {   
        $this->data['models']            = $this->repo->all();
       
        return parent::getIndex();
    }

      public function validaciones(){

        return [ 

            'username'          => 'required|unique:users,name,'.$this->route->getParameter('id'),
            'email'          => 'required|unique:users,email,'.$this->route->getParameter('id'),
        ];
    }


    public function mensajes(){
       
        return [
            'username.required' => 'El campo :attribute es requirido.',
            'username.unique'   => 'El usuario ya se encuentra en la base de datos', 

            'email.required' => 'El campo :attribute es requirido.',
            'email.unique'   => 'El email ya se encuentra en la base de datos', 
          
        ];

    }
    
}