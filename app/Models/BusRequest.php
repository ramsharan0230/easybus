<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusRequest extends Model
{
    protected $table='bus_requests';
    protected $fillable=['bus_id','sender_id','vendor_id','acceptance_status','reject_status'];

    public function bus(){
    	return $this->belongsTo('App\Models\Bus','bus_id');
    }
    public function requestSender(){
    	return $this->belongsTo('App\User','sender_id');
    }
    public function vendors(){
    	return $this->belongsTo('App\User','vendor_id');
    }
    
    
}
