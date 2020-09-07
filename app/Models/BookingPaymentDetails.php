<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingPaymentDetails extends Model
{
    protected $fillable=['booking_id','vendor_id','counter_id','date','payment_status','price'];
    protected $table='booking_payment_details';

    public function booking(){
    	return $this->belongsTo('app\Models\BusBooking','booking_id');
    }
}
