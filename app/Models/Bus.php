<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable=['bus_number','bus_name','seat_limit','made_year','manufacturer','model','color','bus_route','service_type','assistant_1','assistant_2','assistant_one_phone','assistant_two_phone','image_1','image_2','row','column','to','from','user_id','bus_category','facilities','notice','departure_time','boarding_point','new','image_3','status'];

    public function busseat(){
    	return $this->hasMany('App\Models\BusSeat');
    }
    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }
    public function driver(){
    	return $this->belongsTo('App\User','assistant_1');
    }
    public function conductor(){
    	return $this->belongsTo('App\User','assistant_2');
    }
    public function busBooking(){
        return $this->hasMany('App\Models\BusBooking','bus_id');
    }
    public function bus_category(){
        return $this->belongsTo('App\Models\BusCategory','bus_category');
    }
    public function busRoutine(){
        return $this->hasMany('App\Models\BusRoutine');
    }
    public function advertisements(){
        return $this->hasMany('App\Models\Advertisement');
    }
    
}
