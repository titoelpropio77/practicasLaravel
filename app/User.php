<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
 use App\Role;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];
    public function roles()
    {
        // return $this->belongsTo(Role::class);//este me relaciona 2 tablas
        return $this->belongsToMany(Role::class, 'assigned_roles');
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function hasRoles(array $roles)
    {
        //con el metodo pluck trae todo los nombre de usuario y con el metodo intersect verifica si contiene el nombre dado el role que llega por parametro
         //$this->roles->pluck('name')->contains($roles);
        return  $this->roles->pluck('name')->intersect($roles)->count();

        // foreach ($roles as $role ) 
        // {

        //     // foreach ($this->roles as $userRole) 
        //     // {
        //     //     if($userRole->name=== $role)
        //     //     {
        //     //         return true;        
        //     //     }

        //     // }
            
        // }
        // return false;  
    }
    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
