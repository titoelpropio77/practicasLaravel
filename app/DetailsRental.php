<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailsRental extends Model
{
    protected $table = 'realestate_detailsrental';
    protected $fillable = [
    	'id',
    	'type_money',
    	'date_rental',
        'date_finish',
    	'type_pay',
    	'tipo_rental',
    	'pay_rental',
    	'date_payment',
    	'date_anticipe_pay',
    	'rental_time',
    	'clients_id',
    	'room_id',
    	'payment',
    	'interest_payment',
    	'includes_light',
    	'include_water',
    	'status_interest',
    	'light_match',
    	'water_match',
    ];
}
