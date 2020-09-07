<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    //

    protected $fillable=['company_name','address','company_email','company_phone','pan','pan_image','company_image','user_id'];
    protected $table ='company_infos';

    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }
}
