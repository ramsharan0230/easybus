<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','phone','address','father_name','mother_name','citizen_no','passport_image','image','citizen_front','citizen_back','password','company_name','address','company_email','company_phone','pan','pan_image','company_image','parent_id','driving_front','driving_back','category','publish','company_reg_no'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function companyInfo(){
    //     return $this->hasOne('App\Models\CompanyInfo','user_id');
    // }
    //number of bus of vendor
    public function buses(){
        return $this->hasMany('App\Models\Bus','user_id');
    }
    //bus request received by vendor
    public function bus_request(){
        return $this->hasMany('App\Models\BusRequest','vendor_id');
    }
    public function vendors_counter(){
        return $this->hasMany('App\Models\BusRequest','vendor_id');
    }
    public function sent_request(){
        return $this->hasMany('App\Models\BusRequest','sender_id');   
    }
    //bus of counter
    public function counter_bus(){
        return $this->hasMany('App\Models\BusRequest','sender_id'); 
    }
    //assitants of vendor
    public function assistants(){
        return $this->hasMany('App\User','parent_id');
    }
    //vendor in which assistant work
    public function vendoreRelatedToAssistant(){
        return $this->belongsTo('App\User','parent_id');
    }
    public function vendor_bookings(){
        return $this->hasMany('App\Models\BusBooking','vendor_id');
    }
    //bus related to conductor
    public function conductor_bus(){
        return $this->hasOne('App\Models\Bus','assistant_2');
    }
    //bus related to driver
    public function driver_bus(){
        return $this->hasOne('App\Models\Bus','assistant_1');
    }
    public function counters_vendor(){
        return $this->hasMany('App\Models\BusRequest','sender_id');
    }
}
