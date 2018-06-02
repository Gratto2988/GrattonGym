<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public function booking()
    {
        $this->hasMany(Booking::class);
    }

    public function mentor()
    {
    	return $this->belongsTo(Mentor::class);
    }
}
