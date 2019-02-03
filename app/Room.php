<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TypeRooms;
class Room extends Model
{
    protected $table = 'realestate_rooms';

    protected $fillable = [
    	'id',
    	'internal_code',
    	'name',
    	'description',
    	'price',
    	'address',
    	'description_details',
    	'number_room',
        'business_id',
    	'status',
    	'typerooms_id'
    ];
    function typeRoom()
    {
    	return $this->belongsTo(TypeRooms::class, 'typerooms_id');
    }
}
