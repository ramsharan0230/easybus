<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempBooking extends Model
{
    protected $fillable=['bus_id','date','booked','seat_id','name','phone','pickup_station','drop_station','client_id','bus_no','book_no','from','to','booked_on','time','price','shift','token','routine_id','vendor_id','online_payment'];
    protected $table='temp_bookings';
}
