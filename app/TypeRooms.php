<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeRooms extends Model
{
    protected $table = 'realestate_typerooms';

    protected $fillable = [
    	'id',
    	'name'
    ];
}
