<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 

class Booking extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function class()
    {
    	return $this->belongsTo(Classes::class);
    }

    protected $fillable = [
        'booking_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'booking_id'
    ];
}
