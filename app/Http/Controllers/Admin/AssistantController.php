<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\nepalicalendar\nepali_date;
use App\Repositories\Destination\DestinationRepository;
use App\Repositories\Bus\BusRepository;
use App\Repositories\BusRoutine\BusRoutineRepository;
use App\Repositories\Booking\BookingRepository;
use Auth;
use Carbon\Carbon;

class AssistantController extends Controller
{
    public function __construct(nepali_date $calendar,DestinationRepository $destination,BusRepository $bus,BusRoutineRepository $busroutine,BookingRepository $booking){
        $this->calendar=$calendar;
        $this->destination=$destination;
        $this->bus=$bus;
        $this->booking=$booking;
        $this->busroutine=$busroutine;
    }
    public function index(){
        $year_en = date("Y",time());
        $month_en = date("m",time());
        $day_en = date("d",time());
        $date_ne = $this->calendar->get_nepali_date($year_en, $month_en, $day_en);
        $nepali_today=$date_ne['y'].'-'.$date_ne['m'].'-'.$date_ne['d'];
        // dd($nepali_today);
    	$user=Auth::user();
    	if($user->category=='driver'){
    		$bus=$user->driver_bus;
    	}else{
    		$bus=$user->conductor_bus;	
    	}
        $bookings=[];
        if($bus){
            $bookings=$bus->busBooking()->orderBy('date','desc')->get();
        }
    	return view('admin.assistant.passengerList',compact('bus','user','bookings'));
    }
    public function busview(){
    	$user=Auth::user();
    	if($user->category=='driver'){
    		$bus=$user->driver_bus;
    	}else{
    		$bus=$user->conductor_bus;	
    	}

        // $date_ne = $this->calendar->get_nepali_date($year_en, $month_en, $day_en);
        // $nepali_today=$date_ne['y'].'-'.$date_ne['m'].'-'.$date_ne['d'];

    	return view('admin.assistant.busView',compact('bus'));
    }
    public function changeDetail(){
        $user=Auth::user();
        $busroutines=[];
        if($user->category=='driver'){
            $bus=Auth::user()->driver_bus;
            if($bus){
                $busroutines=$bus->busRoutine;
            }else{
                return redirect()->back()->with('message','You are not associated with any bus');
            }
            
        }else{
            $bus=Auth::user()->conductor_bus;
            if($bus){
                $busroutines=$bus->busRoutine;
            }else{
                return redirect()->back()->with('message','You are not associated witnh any bus');
            }
            
        }
        
        $destinations=$this->destination->all();
        return view('admin.assistant.changeDetail',compact('bus','destinations','busroutines'));
    }
    public function updateBusDetail(Request $request,$id){
        $this->validate($request,['service_type'=>'required','from'=>'required','to'=>'required','price'=>'required','bus_category'=>'required','facilities'=>'required|regex:/[,]+/']);
        $this->bus->update($request->all(),$id);
        return redirect()->back()->with('message','Detail Updated Successfully');
    }
    public function addRoutine($id){
        $destinations=$this->destination->get();
        return view('admin.assistant.addRoutine',compact('destinations','id'));
    }
    public function saveRoutine(Request $request){
        
        $this->validate($request,['from'=>'required','to'=>'required','date'=>'required','time'=>'required','shift'=>'required','price'=>'required','shift'=>'required','']);
        $this->busroutine->create($request->all());
        return redirect()->route('changeDetail')->with('message','routine added Sucessfully');
    }
    public function editBusRoutine($id){

        $detail=$this->busroutine->findOrFail($id);
        $destinations=$this->destination->get();
        return view('admin.assistant.editBusRoutine',compact('detail','destinations'));
    }
    public function updateRoutine(Request $request,$id){
        
        $this->validate($request,['from'=>'required','to'=>'required','date'=>'required','time'=>'required','shift'=>'required','price'=>'required','shift'=>'required','']);
        $data=$this->busroutine->update($request->all(),$id);
        
        return redirect()->route('changeDetail')->with('message','routine edited Sucessfully');

    }
    public function deleteRoutine($id){
        $this->busroutine->destroy($id);
        return redirect()->back()->with('message','Routine deleted successfully');
    }
    public function smsView($id){
        $detail=$this->busroutine->findOrFail($id);

        return view('admin.assistant.smsView',compact('detail'));
    }
    public function saveSms(Request $request){
        
        $data=$this->busroutine->findOrFail($request->id);
        $this->busroutine->update($request->all(),$request->id);
        return redirect()->back();

    }
    public function sendSms($id){
        $routine=$this->busroutine->findOrFail($id);

        $bookings=$this->booking->where('date',$routine->date)->where('from',$routine->from)->where('to',$routine->to)->where('shift',$routine->shift)->where('bus_id',$routine->bus_id)->groupBy('phone')->get();
        
        $ch = curl_init();

        if($routine->sms){
            if(count($bookings)>0){
                 foreach($bookings as $book){
                     
                     $args = http_build_query(array('token' => 'pLrVOQeOSHOed96CJrQO', 'from' => 'InfoSMS', 'to' => $book->phone, 'text' => $routine->sms));
                     $url = "http://api.sparrowsms.com/v2/sms/";
                 
                     curl_setopt($ch, CURLOPT_URL, $url);
                     curl_setopt($ch, CURLOPT_POST, 1);
                     curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                // Response
                     $response = curl_exec($ch);
                     $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                 }
            }else{
                return redirect()->back()->with('message','No Booking Found');
            }
        }else{
            return redirect()->back()->with('message','write some notice');
        }
        
        
        curl_close($ch);
        return redirect()->back()->with('message','Message Sent Successfully');

    }
}
