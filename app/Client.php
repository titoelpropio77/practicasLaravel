<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'realestate_clients';
    protected $fillable = [
    	'id',
    	'internal_code', 
    	'name',
    	'lastname',
    	'cedula_identidad',
    	'extension_cedula',
    	'celphone',
    	'phone',
    	'email',
    	'address',
    	'room_id'
    ];
}
