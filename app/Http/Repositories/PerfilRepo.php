<?php
/**
 * Created by PhpStorm.
 * User: mbarrios
 * Date: 3/7/15
 * Time: 12:42
 */

namespace App\Http\Repositories;
use App\Entities\Profiles;

class PerfilRepo extends BaseRepo {

    public function getModel()
    {
        return new Profiles;
    }




}