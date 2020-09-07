<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusDetailController extends Controller
{
    public function busDetailCreate($id){
    	return view('admin.bus.busDetailCreate');
    }
}
