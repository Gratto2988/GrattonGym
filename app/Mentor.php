<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Mentor extends Model
{
    public function class()
    {
    	return $this->hasMany(Classes::class);
    }

}
