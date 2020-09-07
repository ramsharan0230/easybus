<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BusRoutine\BusRoutineRepository;
use App\Repositories\Destination\DestinationRepository;
use App\Repositories\Bus\BusRepository;
use App\Repositories\Booking\BookingRepository;

class BusRoutineController extends Controller
{
	public function __construct(BusRoutineRepository $busroutine,BusRepository $bus,DestinationRepository $destination,BookingRepository $booking){
		$this->busroutine=$busroutine;
		$this->bus=$bus;
        $this->destination=$destination;
        $this->booking=$booking;
	}
    public function busRoutine($id){
    	$bus=$this->bus->findOrFail($id);
    	$busroutines=$bus->busRoutine;
    	return view('admin.bus.busRoutineList',compact('busroutines','bus'));
    }
    public function addRoutine($id){
        $destinations=$this->destination->get();
    	return view('admin.bus.addRoutine',compact('destinations','id'));
    }
    public function saveRoutine(Request $request){
        
        $this->validate($request,[
            'from'=>'required',
            'to'=>'required',
            'date'=>'required',
            'time'=>'required',
            'shift'=>'required',
            'price'=>'required',
            'shift'=>'required',
            'sub_destination'=> 'sometimes|nullable|required|array',
            'sub_destination.*'         => 'sometimes|nullable|required|string|min:2',
            'sub_price' => 'sometimes|nullable|required|array',
            'sub_price.*'=>'sometimes|nullable|required|integer|gt:0',
        ]);
        
        $result=$this->busroutine->create($request->all());
        if($request->sub_destination){
            $this->saveSubDestination($result->id,$request->sub_destination,$request->sub_price);
        }
        return redirect()->route('busRoutine',$request->bus_id)->with('message','routine added Sucessfully');
    }
    public function editBusRoutine($id){
        $detail=$this->busroutine->findOrFail($id);
        $destinations=$this->destination->get();
        return view('admin.bus.editBusRoutine',compact('detail','destinations'));
    }
    public function updateRoutine(Request $request,$id){
        
        $this->validate($request,[
            'from'=>'required',
            'to'=>'required',
            'date'=>'required',
            'time'=>'required',
            'shift'=>'required',
            'price'=>'required',
            'shift'=>'required',
            'sub_destination'=> 'sometimes|nullable|required|array',
            'sub_destination.*'         => 'sometimes|nullable|required|string|min:2',
            'sub_price' => 'sometimes|nullable|required|array',
            'sub_price.*'=>'sometimes|nullable|required|integer|gt:0',
        ]);
        $data=$this->busroutine->update($request->all(),$id);
        
        if($request->sub_destination){
            $this->busroutine->deleteSubDestination($id);
            $this->saveSubDestination($id,$request->sub_destination,$request->sub_price);
        }
        $detail=$this->busroutine->findOrFail($id);
        return redirect()->route('busRoutine',$detail->bus_id)->with('message','routine edited Sucessfully');

    }
    public function deleteRoutine($id){
        $booking=$this->booking->where('routine_id',$id)->first();
        if($booking){
            return redirect()->back()->with('message','This routine has bookings');
        }else{
            $this->busroutine->destroy($id);
            return redirect()->back()->with('message','Routine deleted successfully');
        }
        
    }
    public function smsView($id){
        $detail=$this->busroutine->findOrFail($id);

        return view('admin.bus.smsView',compact('detail'));
    }
    public function saveSms(Request $request){
        
        $data=$this->busroutine->findOrFail($request->id);
        $this->busroutine->update($request->all(),$request->id);
        return redirect()->back()->with('message','Sms saved successfully');

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
    public function saveSubDestination($routine_id,$sub_destination,$sub_price){
        for($i=0;$i<count($sub_destination);$i++){
            $data=['busroutine_id'=>$routine_id,'sub_destination'=>$sub_destination[$i],'sub_price'=>$sub_price[$i]];
            $this->busroutine->saveSubDestination($data);
        }
    }
    public function removeSubDestination(Request $request){

        $this->busroutine->removeSubDestination($request->id);
        return "success";

    }
}
