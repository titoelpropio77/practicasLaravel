<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
    	'id',
    	'nombre',
    	'email',
    	'phone',
    	'mensaje',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function note()
    {
        return $this->morphOne(Note::class,'notable');
    }
}
