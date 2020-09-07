<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusSeat extends Model
{
    protected $fillable=['bus_id','seat_name','row_col'];
    protected $table='bus_seats';

    public function bus(){
    	return $this->belongsTo('App\Models\Bus');
    }
    public function booking(){
    	return $this->hasMany('App\Models\BusBooking','seat_id');
    }
}
