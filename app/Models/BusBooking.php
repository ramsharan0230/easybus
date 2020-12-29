<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusBooking extends Model
{
    protected $fillable=['bus_id','date','booked','seat_id','name','phone','pickup_station','drop_station','client_id','bus_no','book_no','from','to','booked_on','time','price','shift','token','routine_id','paid','vendor_id','sub_destination','online_payment','counter_id'];
    protected $table='bus_bookings';

    public function bus(){
    	return $this->belongsTo('App\Models\Bus','bus_id');
    }
    public function seat(){
    	return $this->belongsTo('App\Models\BusSeat','seat_id');
    }
    public function counter(){
    	return $this->belongsTo('App\User','counter_id');
    }

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }
}
