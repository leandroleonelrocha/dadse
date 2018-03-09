<?php
/**
 * Created by PhpStorm.
 * User: llrocha
 * Date: 26/08/2015
 * Time: 12:03 PM
 */
namespace App\Entities;
use App\Entities\User;

class Profiles extends Entity
{
    protected $table        = 'profiles';
    protected $fillable     = ['perfil'];
    // protected $hidden   = ['password', 'remember_token'];

    public function user()
    {
        return $this->hasMany(User::getClass());
    }


}
