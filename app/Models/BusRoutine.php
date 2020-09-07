<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusRoutine extends Model
{
    protected $fillable=['bus_id','from','to','date','time','shift','price','notice','sms','boarding_point','publish'];
    protected $table='bus_routines';

    public function bus(){
    	return $this->belongsTo('App\Models\Bus','bus_id');
    }
    public function bookings(){
    	return $this->hasMany('App\Models\BusBooking','routine_id');
    }
    public function subDestinations(){
    	return $this->hasMany('App\Models\SubDestination','busroutine_id');
    }

}
