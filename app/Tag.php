<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillabe = ['name'];

    public function messages()
    {
    	return $this->morphedByMany(Message::class, 'taggable');
    }
}
