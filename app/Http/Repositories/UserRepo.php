<?php
/**
 * Created by PhpStorm.
 * User: mbarrios
 * Date: 3/7/15
 * Time: 12:42
 */

namespace App\Http\Repositories;
use App\Entities\User;
use App\Entities\Medicos;
use App\Entities\Proveedores;
use Bican\Roles\Models\Role;
use App\Entities\ProveedoresEmail;

class UserRepo extends BaseRepo {

    public function getModel()
    {
        return new User;
    }



    public function ListAndPaginate($paginate = 50, $search = null)
    {
        $qry = $this->model->orderBy('name')
            ->paginate($paginate);

        return $qry;
    }

    public function searchByUsername($username)
    {
        return $this->model
            ->where('username', '=', $username)
            ->first();
    }

    public function edit($model, $datos)
    {   
        //$roles= [1,2];
        //$role  = Role::find($datos['rol_id']);

        $model = parent::edit($model, $datos);
        $model->detachAllRoles(); 
        $model->attachRole($datos['roles_id']);
        $model->save();
    }

    public function create($datos)
    {   
        //$role  = Role::find($datos['rol_id']);
    
        $model = parent::create($datos);
        $model->attachRole($datos['roles_id']);
        $model->save();

      }




}