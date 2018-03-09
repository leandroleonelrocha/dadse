<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateRolesRequest;
use Bican\Roles\Models\Role;
use Bican\Roles\Models\Permission;
use Illuminate\Http\Request;

class RolesController extends Controller {

    protected $rol;
    protected $permiso;

    public function __construct(Role $rol, Permission $permiso){
        $this->rol = $rol;
        $this->permiso = $permiso;
    }

    public function index()
    {
        $data['roles'] = $this->rol->all();

        return view('config.roles.index')->with($data);
    }

    public function create()
    {
        return view('config.roles.form');
    }

    public function store(CreateRolesRequest $request)
    {
//        $slug = trim(str_replace(" ",".",$request->get('name')));
        $slug = trim($request->get('name'));
//        dd($slug);
        $slug = $this->limpiarCaracteresEspeciales($slug);

        $adminRole = $this->rol->create([
            'name' => $request->get('name'),
            'slug'=> $slug,
            'description' => $request->get('description'), // optional
            'level' => $request->get('level')
        ]);

        return redirect()->route('roles.index')->with('msg_success','Se creo correctamente el rol');
    }

    public function edit($id)
    {
        $data['rol'] = $this->rol->find($id);

        return view('config.roles.form')->with($data);
    }

    public function update($id,CreateRolesRequest $request)
    {
        $data['rol'] = $this->rol->find($id);
        if($data['rol']->name != $request->get('name')){
            $slug = trim($request->get('name'));
            $data['rol']->slug = $this->limpiarCaracteresEspeciales($slug);
        }
        $data['rol']->fill($request->only('name','description','level'));

        if($data['rol']->save())
            return redirect()->route('roles.index')->with('msg_success','Se modificó correctamente el rol');
        else
            return view('config.roles.form')->withErrors('No se pudo modificar el rol');
    }



    public function delete($id){

        $rol = $this->rol->find($id);
        if($rol->delete())
            return redirect()->back()->with('msg_success','Se eliminó correctamente el rol');
        else
            return redirect()->back()->withErrors('No se pudo eliminar rol');

    }

    public function permisos($id)
    {
        $data['permisos'] = $this->permiso->all();
        $data['rol'] = $this->rol->find($id);
       
        return view('config.roles.permisos')->with($data);

    }

    public function postPermisos(Request $request, $id)
    {
       $permisos = $request->permission_id;
       $rol = $this->rol->find($id);
       $rol->detachAllPermissions();
       $rol->permissions()->attach($permisos);
       return redirect()->back()->with('msg_success','Se agregaron correctamente los permisos');

    }
    


}