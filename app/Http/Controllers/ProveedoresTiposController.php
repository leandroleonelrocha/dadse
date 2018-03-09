<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Route;
use App\Http\Repositories\ProveedoresTiposRepo as Repo;

class ProveedoresTiposController extends Controller
{
    protected $route;

    public function __construct( Route $route , Repo $repo)
    {
        $this->route            =  $route;
        $this->repo             =  $repo;

        $this->data['seccion']  = 'Tipos de Proveedores';
        $this->index            = 'proveedores_tipos.index';
        $this->form             = 'proveedores_tipos.form';
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
            'nombre' => 'required'

        ];
    }

    public function mensajes(){

         return [
            'nombre.required' => 'requirido'

        ];
    }

}
