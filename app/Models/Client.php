<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use Notifiable;
    protected $fillable = [

        'name', 'email', 'password','mobile_number','address','image','opt_mobile_number','address'

    ];

 

    /**

     * The attributes that should be hidden for arrays.

     *

     * @var array

     */

    protected $hidden = [

        'password', 'remember_token',

    ];  

    public function products(){
        return $this->belongsToMany('App\Models\Detail','user_products','client_id','detail_id');
    }
    
}
