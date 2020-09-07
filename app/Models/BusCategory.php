<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusCategory extends Model
{
    protected $fillable=['name','publish'];
    protected $table='bus_categories';

    public function bus(){
    	return $this->hasMany('App\Models\Bus','bus_category');
    }
}
