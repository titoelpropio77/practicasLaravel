<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
	const TYPE_LUZ ='LUZ';
	const TYPE_AGUA ='AGUA';
	const TYPE_OTROS ='OTROS';
    protected $table = 'realestate_meters';
    protected $fillable = [
    	'id',
    	'name_owner',
    	'internalcode',
    	'company',
    	'type',
    	'name_company'
    ];
}
