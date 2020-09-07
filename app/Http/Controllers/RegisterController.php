<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Repositories\Destination\DestinationRepository;
use App\Repositories\Bus\BusRepository;
use App\Repositories\BusCategory\BusCategoryRepository;
use App\Repositories\nepalicalendar\nepali_date;
use App\Repositories\Booking\BookingRepository;
use App\Repositories\BusRoutine\BusRoutineRepository;
use App\Models\BusBooking;
use DB;
use Auth;
use Session;


class RegisterController extends Controller
{
	public function __construct(DestinationRepository $destination,BusRepository $bus,BusCategoryRepository $buscategory,nepali_date $calendar,BookingRepository $booking,BusRoutineRepository $busroutine){
        $this->middleware('auth:admin');
        $this->destination=$destination;
        $this->buscategory=$buscategory;
        $this->bus=$bus;
        $this->calendar=$calendar;
        $this->booking=$booking;
        $this->busroutine=$busroutine;
    }
    public function account(){
      	
		return view('front.user.dashboard');
    }
    public function profile(){
    	return view('front.user.profile');
    }
    public function editProfile(){
        return view('front.user.editProfile');
    }
    public function updateProfile(Request $request){
        // dd($request->all());
        $user=Auth::guard('admin')->user();
        Client::find($user->id)->update($request->all());
        return redirect()->back()->with('editmessage','Updated Successfully');
    }
    public function searchBus(){
        $destinations=$this->destination->all();
        return view('front.user.searchBus',compact('destinations'));
    }
    public function userBusSearch(Request $request){
        $this->validate($request,['from'=>'required','to'=>'required','date'=>'required','shift'=>'required']);
        $date=explode('-',$request->date);
        $check_date=date('Y-m-d');
        
        $end_date=$this->calendar->get_eng_date($date[0],$date[1],$date[2]);
        $nepali_form_date=$end_date['y'].'-'.$end_date['m'].'-'.$end_date['d'];
        
        if($nepali_form_date<$check_date){
            return redirect()->back()->with('message','Booking cannot be made for past');
        }else{
            
            if(session()->get('jointable')){

                session()->forget('jointable');
            }
            session()->put('check_date',$request->date); 
            session()->put('from',$request->from); 
            session()->put('to',$request->to); 
            session()->put('shift',$request->shift);   
            // dd($request->shift);
            $busRoutine=$this->busroutine->where('from',$request->from)->where('to',$request->to)->where('date',$request->date)->where('shift',$request->shift)->get();
            $buses=[];
            foreach($busRoutine as $routine){
                $bus=$routine->bus;
                if($bus->status=='approved'){
                    array_push($buses,$bus);    
                }
                
            }
            $value['facilities'] ='';
            $from=$request->from;
            $to=$request->to;
            $shift=$request->shift;
            // dd($buses);
            $busCategories=$this->buscategory->all();
            $destinations=$this->destination->all();
            return view('front.user.userSearchBusResult',compact('buses','busCategories','from','to','shift','destinations'));
        }
        
    }
    public function userSelectBusByCategory(Request $request){
        Session::forget('sub_destination');
                $this->validate($request,['from'=>'required','to'=>'required','date'=>'required','shift'=>'required']);
                $date=explode('-',$request->date);
                $check_date=date('Y-m-d');
                
                $end_date=$this->calendar->get_eng_date($date[0],$date[1],$date[2]);
                $nepali_form_date=$end_date['y'].'-'.$end_date['m'].'-'.$end_date['d'];
                
                if($nepali_form_date<$check_date){
                    return redirect()->back()->with('message','Booking cannot be made for past');
                }else{
                    
                    if(session()->get('jointable')){

                        session()->forget('jointable');
                    }
                    session()->put('check_date',$request->date); 
                    session()->put('from',$request->from); 
                    session()->put('to',$request->to); 
                    session()->put('shift',$request->shift);   
                    // dd($request->shift);
                    $busRoutine=$this->busroutine->where('from',$request->from)->where('to',$request->to)->where('date',$request->date)->where('shift',$request->shift)->get();

                    $buses=[];
                    if($busRoutine){
                        foreach($busRoutine as $routine){
                            $bus=$routine->bus()->where('bus_category',$request->id)->where('status','approved')->first();
                            if($bus){
                                array_push($buses,$bus);
                            }
                            
                        } 
                    }

                    // $buses=$this->bus->where('from',$request->from)->where('to',$request->to)->where('service_type',$request->shift)->get();
                    $value['facilities'] ='';
                
                    $from=$request->from;
                    $to=$request->to;
                    
                    $shift=$request->shift;
                    $date=$request->date;
                    // dd($buses);
                    $busCategories=$this->buscategory->all();
                    $destinations=$this->destination->all();
            return view('front.busByCategory',compact('buses','busCategories','from','to','shift','destinations','date'));
        }
    }
    public function userSaveSession(Request $request){
        $joinValue[$request->bus_id] = $request->seat_id;
        // $new=[];
        // array_push($new, $joinValue);

        session()->push('jointable', $joinValue);
        return $joinValue;
    }
    public function userRemoveSession(Request $request){
    $joinValue[$request->bus_id] = $request->seat_id;
        // return $joinValue;
        $value=Session::get('jointable');
        $array = $this->removeElementWithValue($value, $request->bus_id, $request->seat_id);
         // return $array;
        $reindexed_array = array_values($array);
        session()->forget('jointable');
        session()->put('jointable',$reindexed_array);
        return "success"; 

    }
    public function removeElementWithValue($array, $key, $value){
        foreach($array as $subKey => $subArray){
            if($subArray[$key] == $value){
               unset($array[$subKey]);
            }
        }
        return $array;
    }
    public function bookingHistory(){
        $details=$this->booking->where('client_id',Auth::guard('admin')->user()->id)->orderBy('book_no','asc')->get();
        
        return view('front.user.bookingHistory',compact('details'));
    }
    public function ticketHistory(){
        $year_en = date("Y",time());
        $month_en = date("m",time());
        $day_en = date("d",time());
        $date_ne = $this->calendar->get_nepali_date($year_en, $month_en, $day_en);
        $nepali_today=$date_ne['y'].'-'.$date_ne['m'].'-'.$date_ne['d'];
        $booking_data=$this->booking->where('client_id',Auth::guard('admin')->user()->id)->orderBy('book_no','asc')->where('date','>=',$nepali_today)->get();
        return view('front.user.ticketHistory',compact('booking_data'));
    }
}

