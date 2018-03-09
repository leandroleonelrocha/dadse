<?php
namespace App\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract
{
    use Authenticatable, CanResetPassword, HasRoleAndPermission;

    protected $table = 'users';
    //protected $fillable = ['email', 'password', 'usuario'];
    protected $fillable = ['username', 'fullname', 'email', 'is_active', 'imagen', 'imagen_thumb', 'lastlogin_date', 'slack_username','entities_id','entities_type', 'sedes_id'];

    protected $hidden = ['password', 'remember_token'];

    //Relaciones
    public function Personas()
    {
        return $this->hasMany(Persona::getClass());
    }

    public function MovimientoSubsidio()
    {
        return $this->hasMany(MovimientoSubsidio::getClass());
    }

    // Mutators
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function entities(){
        return $this->morphTo();
    }

    //Scope
    public function scopeNombre($query, $search)
    {
        if (trim($search) != '')
            $query->orWhere('nombre', 'like', "%$search%");

    }

    public function scopeApellido($query, $search)
    {
        if (trim($search) != '')
            $query->orWhere('apellido', 'like', "%$search%");

    }

    public function getIsActiveAttribute()
    {
        if($this->attributes['is_active'] == 1)
            return 'Activo';

        if($this->attributes['is_active'] == 0)
             return 'Inactivo';
    }

    public function Medico(){
         return $this->hasOne(Medicos::getClass());
    }

    public function getRolesIdAttribute(){
         return $this->roles()->lists('role_id')->toArray();
    }

}