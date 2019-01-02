<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
 	public function user()
    {
        // return $this->hasOne('App\Role','id','id');
        // return $this->hasOne('App\User','id','id');
        return $this->belongsTo(User::class);
    }
}
