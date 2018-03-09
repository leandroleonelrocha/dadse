<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreatePermissionsRequest;
use Bican\Roles\Models\Permission;

class PermisosController extends Controller {

    protected $permisos;

    public function __construct(Permission $permisos){
        $this->permisos = $permisos;
    }

    public function index()
    {
        
        $data['permisos'] = $this->permisos->all();

        return view('config.permisos.index')->with($data);
    }

    public function create()
    {
        return view('config.permisos.form');
    }

    public function store(CreatePermissionsRequest $request)
    {
        $name = $request->get('action')." ".$request->get('name');
//        $slug = trim(str_replace(" ",".",$request->get('name')));
        $slug = trim($name);
//        dd($slug);
        $slug = $this->limpiarCaracteresEspeciales($slug);

        $adminRole = $this->permisos->create([
            'name' => $name,
            'slug'=> $slug,
            'description' => $request->get('description') // optional
        ]);

        return redirect()->route('permisos.index')->with('ok','Se creo correctamente el permiso');
    }

    public function edit($id)
    {
        $data['permiso'] = $this->permisos->find($id);

        return view('config.permisos.form')->with($data);
    }

    public function update($id,CreatePermissionsRequest $request)
    {
        $data['permiso'] = $this->permisos->find($id);
        dd($data['permiso']->splitSlug("name"));
        if(($data['permiso']->splitSlug("name") != strtolower($request->get('name'))) || ($data['permiso']->splitSlug("action") != strtolower($request->get('action')))) {
            $name = $request->get('action')." ".$request->get('name');
            $slug = trim(str_replace(" ",".",$request->get('name')));
            $slug = trim($name);
//        dd($slug);
            $data['permiso']->slug = $this->limpiarCaracteresEspeciales($slug);
            $data['permiso']->name = $name;
        }
        $data['permiso']->fill($request->only('description'));

        if($data['permiso']->save())
            return redirect()->route('permisosindex')->with('ok','Se modificó correctamente el permiso');
        else
            return view('config.permisos.form')->withErrors('No se pudo modificar el permiso');
    }



    public function delete($id){

        $permiso = $this->permisos->find($id);
        if($permiso->delete())
            return redirect()->back()->with('ok','Se eliminó correctamente el permiso');
        else
            return redirect()->back()->withErrors('No se pudo eliminar el permiso');

    }

}