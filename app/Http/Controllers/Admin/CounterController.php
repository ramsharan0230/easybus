<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Bus\BusRepository;
use App\Repositories\Destination\DestinationRepository;
use App\Repositories\User\UserRepository;
use App\Models\BusRequest;
use App\Repositories\nepalicalendar\nepali_date;
use App\Models\BusBooking;
use App\Models\BusSeat;
use App\Repositories\BusCategory\BusCategoryRepository;
use App\Repositories\BusRoutine\BusRoutineRepository;
use App\Repositories\Booking\BookingRepository;
use App\Models\BookingPaymentDetails;

// use App\Repositories\Booking\BookingRepository;
use Auth;
use Image;
use Session;
use DB;

class CounterController extends Controller
{
	public function __construct(BusRepository $bus,DestinationRepository $destination,UserRepository $user,nepali_date $calendar,BusCategoryRepository $buscategory,BookingRepository $booking,BusRoutineRepository $busroutine){
		$this->bus=$bus;
		$this->destination=$destination;
        $this->user=$user;
        $this->calendar=$calendar;
        $this->buscategory=$buscategory;
        $this->booking=$booking;
        $this->busroutine=$busroutine;
        
	}
    public function counterDashboard(){
        $allBuses=Auth::user()->counter_bus()->where('acceptance_status',1)->where('reject_status',0)->get();
        
        $year_en = date("Y",time());
        $month_en = date("m",time());
        $day_en = date("d",time());
        $date_ne = $this->calendar->get_nepali_date($year_en, $month_en, $day_en);
        $check_date=$date_ne['y'].'-'.((strlen($date_ne['m']) == 2) ? $date_ne['m'] : "0".$date_ne['m']).'-'.$date_ne['d'];
        return view('admin.counter.dashboard',compact('allBuses','check_date'));
    }
    public function busSearchView(){
        
        $destinations=$this->destination->get();
    	return view('admin.counter.searchBus',compact('destinations'));
    }
    public function searchBus(Request $request){
    	$destinations=$this->destination->get();
    	$from=$request->from;
    	$to=$request->to;
    	$buses=$this->bus->where('from',$request->from)->where('to',$request->to)->get();
    	return view('admin.counter.searchBusResult',compact('buses','destinations','from','to'));
    }
    public function searchBusByNumber(Request $request){
        $buses=$this->bus->where('bus_number', 'like', "%{$request->number}%")->orWhere('bus_name', 'like', "%{$request->number}%")->where('status','approved')->get();
        return view('admin.counter.searchBusByNumberResult',compact('buses'));

    }
    public function busView($id){
    	$bus=$this->bus->findOrFail($id);
    	return view('admin.counter.busView',compact('bus'));
    }
    public function sendBusRequest(Request $request){
        BusRequest::create($request->all());
        return $request->all();
    }
    public function editInfo(){

        return view('admin.counter.updateInfo');
    }
    public function updateInfo(Request $request,$id){
        $value=$request->except('pan_image','company_image');
        if($request->pan_image){
            $documents=$request->file('pan_image');
            $filename=time().'.'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['pan_image']=$filename;
            
        }
        if($request->company_image){
            $documents=$request->file('company_image');
            $filename=time().'.'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['company_image']=$filename;
            
        }
        // $value['user_id']=Auth::user()->id;

        $this->user->update($value,$id);
        return redirect()->back();
    }
    public function addCounterInfo(Request $request,$id){
        $value=$request->except('pan_image','company_image');
        if($request->pan_image){
            $documents=$request->file('pan_image');
            $filename=time().'.'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['pan_image']=$filename;
            
        }
        if($request->company_image){
            $documents=$request->file('company_image');
            $filename=time().'.'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['company_image']=$filename;
            
        }
        // $value['user_id']=Auth::user()->id;

        $this->user->addInfo($value,$id);
        return redirect()->back();
    }
    public function imageProcessing($image){
        
        $input['imagename'] = time().'.'.$image->getClientOriginalName();
        $thumbPath = public_path('images/thumbnail');
        $listingPath = public_path('images/listing');
        $mainPath = public_path('images/main');
        $img = Image::make($image->getRealPath());
        $img->fit(361, 350)->save($thumbPath.'/'.$input['imagename']);
        $img1 = Image::make($image->getRealPath());
        $img1->fit(884, 480)->save($mainPath.'/'.$input['imagename']);
        $img2 = Image::make($image->getRealPath());
        $img2->fit(200, 100)->save($listingPath.'/'.$input['imagename']);
        return $input['imagename'];      
    }
    public function busList(){
        $allBuses=Auth::user()->counter_bus()->where('acceptance_status',1)->where('reject_status',0)->get();
        return view('admin.counter.allBusList',compact('allBuses'));
    }
    public function bookedView($id){
        $bus=$this->bus->findOrFail($id);
        $year_en = date("Y",time());
        $month_en = date("m",time());
        $day_en = date("d",time());
        $date_ne = $this->calendar->get_nepali_date($year_en, $month_en, $day_en);
        $check_date=$date_ne['y'].'-'.((strlen($date_ne['m']) == 2) ? $date_ne['m'] : "0".$date_ne['m']).'-'.$date_ne['d'];
        return view('admin.counter.bookedView',compact('bus','check_date'));
    }
    public function pendingBusList(){
        $allBuses=Auth::user()->counter_bus()->where('acceptance_status',0)->get();
        
        return view('admin.counter.pendingBus',compact('allBuses'));
    }
    public function busLayout($id){
        $bus=$this->bus->findOrFail($id);
        return view('admin.counter.busLayout',compact('bus'));
    }
    public function bookedTicketsView(){
        $allBuses=Auth::user()->counter_bus()->where('acceptance_status',1)->where('reject_status',0)->get();

        return view('admin.counter.bookedTicketsView',compact('allBuses'));
    }
    public function bookingList($id){
        // dd($id);
        $bookings=BusBooking::where('bus_id',$id)->get();

        $bus=$this->bus->findOrFail($id);
        $year_en = date("Y",time());
        $month_en = date("m",time());
        $day_en = date("d",time());
        $date_ne = $this->calendar->get_nepali_date($year_en, $month_en, $day_en);
        $nepali_today=$date_ne['y'].'-'.$date_ne['m'].'-'.$date_ne['d'];
        $bookings=$bus->busBooking()->orderBy('date','desc')->get();
        
        return view('admin.counter.bookingList',compact('bookings','id','bus'));
    }
    public function bookedbusLayout($id){
        $bus=$this->bus->findOrFail($id);
        $year_en = date("Y",time());
        $month_en = date("m",time());
        $day_en = date("d",time());
        $date_ne = $this->calendar->get_nepali_date($year_en, $month_en, $day_en);
        $check_date=$date_ne['y'].'-'.((strlen($date_ne['m']) == 2) ? $date_ne['m'] : "0".$date_ne['m']).'-'.$date_ne['d'];

        return view('admin.counter.bookedBusLayout',compact('bus','check_date'));
    }
    public function allHistory(){
        $counterbus=Auth::user()->counter_bus()->where('acceptance_status',1)->get();
        $bookings=[];
        foreach($counterbus as $bus){
            $busBookings=BusBooking::orderBy('date','desc')->where('bus_id',$bus->id)->get();
            foreach($busBookings as $book){

                 array_push($bookings,$book);
            }
           
        }
        
        return view('admin.counter.allHistory',compact('bookings'));
    }
    public function searchBookedSeatLayout(Request $request){
        $bus=$this->bus->find($request->id);
        
        $check_date=$request->date;
        return view('admin.counter.include.busLayoutByDate',compact('check_date','bus'));

    }
    public function searchBookingListByDate(Request $request){
        // $bookings=BusBooking::where('bus_id',$request->id)->get();
        $bus=$this->bus->findOrFail($request->id);
        $id=$request->id;
        $bookings=$bus->busBooking()->where('date',$request->date)->get();
        
        return view('admin.counter.include.searchBookingListByDate',compact('bookings','bus','id'));
    }
    public function bookSeat(){
        $destinations=$this->destination->all();
        return view('admin.counter.bookSeat',compact('destinations'));
    }
    public function counterBusSearch(Request $request){
           
            
            if(session()->get('jointable')){

                session()->forget('jointable');
            }
            $nepali_date=$this->calendar->get_nepali_date(date('Y'),date('m'),date('d'));

            
            $newNepaliDate=$nepali_date['y'].'-'.((strlen($nepali_date['m']) == 2) ? $nepali_date['m'] : "0".$nepali_date['m']).'-'.((strlen($nepali_date['d']) == 2) ? $nepali_date['d'] : "0".$nepali_date['d']);

            
            session()->put('check_date',$newNepaliDate); 
            
            $counterBus=Auth::user()->counter_bus()->where('acceptance_status',1)->where('reject_status',0)->get();
            $buses=[];
            foreach($counterBus as $bus){
                $result=$bus->bus;

                if($result->status=='approved'){
                    array_push($buses,$result);
                }
                
            }
            
            $busroutine=[];
            $buses=array_unique($buses);
            foreach($buses as $bus){
                $routine=$bus->busRoutine()->where('date',$newNepaliDate)->get();
                
                
                if($routine){
                    foreach($routine as $routine){
                        array_push($busroutine,$routine);
                    }
                    
                }
            }
            // dd($busroutine);
            $value['facilities'] ='';
        
            $from=$request->from;
            $to=$request->to;
            
            $shift=$request->shift;
            
            $busCategories=$this->buscategory->all();
            $destinations=$this->destination->all();

            return view('admin.counter.busSearchResult',compact('buses','busCategories','from','to','shift','destinations','busroutine','newNepaliDate'));
    }
    public function counterSelectBusByCategory(Request $request){
        session()->forget('jointable');
        $category=$this->buscategory->find($request->id);
        $counterBus=$allBuses=Auth::user()->counter_bus()->where('acceptance_status',1)->where('reject_status',0)->get();
            $buses=[];
            foreach($counterBus as $bus){
                $result=$bus->bus->where('bus_category',$category->id)->first();
                if($result){
                    array_push($buses,$result);
                }
                
            }
            $buses=array_unique($buses);

        return view('admin.counter.busByCategory',compact('buses'));
    }
    public function book_now($id){

        $routine=$this->busroutine->find($id);
        $sub_destination=Session::get('sub_destination');
        
        $check_routine_id='';
        $sub_destination_price='';
        if($sub_destination){
            foreach($sub_destination as $key=>$sub){
                
                $check_routine_id=$key;
                $sub_destination_price=$sub->sub_price;
                
            }
        }
        if($routine){
            session()->put('id',$routine->id);
            $value=Session::get('jointable');

            $total_price=0;
            $seatName='';
            foreach($value as $key=>$val){
                 
                 $keys=array_keys($val);

                 if($keys[0]==$id){
                    if($sub_destination_price){

                        if($check_routine_id==$id){
                            
                            $total_price+=$sub_destination_price;
                        }else{
                            $total_price+=$routine->price;
                        }
                        
                    }else{
                        
                        $total_price+=$routine->price;
                    }
                    
                     foreach($val as $new){
                        $seat=BusSeat::find($new);
                        if($seat){
                            $seatName.=($seatName==""?"":",").$seat->seat_name;
                        }
                     }
                     
                 }
            }
            
            return view('admin.counter.bookingForm',compact('seatName','total_price'));
        }else{
            return redirect()->back();
        } 
    }
    
    public function seatBooking(Request $request){
        $nepali_date=$this->calendar->get_nepali_date(date('Y'),date('m'),date('d'));
        $todaysNepaliDate=$nepali_date['y'].'-'.((strlen($nepali_date['m']) == 2) ? $nepali_date['m'] : "0".$nepali_date['m']).'-'.((strlen($nepali_date['d']) == 2) ? $nepali_date['d'] : "0".$nepali_date['d']);
        $this->validate($request,['name'=>'required','phone'=>'required','pickup_station'=>'required','drop_station'=>'required']);
        
        DB::beginTransaction();
        $id=Session::get('id');
        $routine=$this->busroutine->find($id);
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $randomNumber=substr(str_shuffle($permitted_chars), 0, 10);
        $sub_destination=Session::get('sub_destination');
        
        $check_routine_id='';
        $sub_destination_price='';
        $sub_destination_name='';
        if($sub_destination){
            foreach($sub_destination as $key=>$sub){
                
                $check_routine_id=$key;
                $sub_destination_price=$sub->sub_price;
                $sub_destination_name=$sub->sub_destination;
                
            }
        }
        if($routine){
            session()->put('id',$id);
            $value=Session::get('jointable');
            $total_price=0;
            $seatName='';
            $seat_name=[];
            foreach($value as $key=>$val){
                 
                 $keys=array_keys($val);

                if($keys[0]==$id){
                    $total_price+=$routine->price;
                    if(Auth::check()){
                        $counter_id=Auth::user()->id;
                    }else{
                        $counter_id='';
                    }
                    foreach($val as $new){
                        $seat=BusSeat::find($new);
                            $last_booking=$this->booking->orderBy('created_at','desc')->first();
                            if($last_booking){
                                $current_booking_no=$last_booking->book_no+1;
                            }else{
                                $current_booking_no=1;
                            }
                            $booking=$this->booking->where('seat_id',$seat->id)->where('bus_id',$routine->bus->id)->where('routine_id',$routine->id)->first();
                        
                        if($booking){
                        	return redirect()->route('counterBusSearch');
                        }else{
                        	if($seat){
                        	    $data['bus_id']=$routine->bus->id;
                        	    $data['seat_id']=$seat->id;
                        	    $data['token']=$randomNumber;
                        	    $data['date']=session()->get('check_date');
                        	    $data['name']=$request->name;
                        	    $data['counter_id']=$counter_id;
                                $data['booked_on']=$todaysNepaliDate;
                        	    $data['pickup_station']=$request->pickup_station;
                                $data['price']=$routine->price;
                                $data['sub_destination']=null;
                                $data['online_payment']=0;
                                $data['paid'] = $request->paid=="on"?1:0;
                                $data['drop_station']=$request->drop_station;
                                if($sub_destination_price){

                                    if($check_routine_id==$id){
                                        
                                        
                                        $data['price']=$sub_destination_price;
                                        $payment['price']=$sub_destination_price;
                                        $data['drop_station']=$sub_destination_name;
                                        $data['sub_destination']=$sub_destination_name;
                                        
                                    }else{
                                        
                                        $data['price']=$routine->price;
                                        $payment['price']=$result->price;
                                        $data['drop_station']=$request->drop_station;
                                        $data['sub_destination']=null;
                                        
                                    }
                                    
                                }
                                $data['to']=$routine->to;
                        	    $data['phone']=$request->phone;
                        	    $data['book_no']=$current_booking_no;
                        	    $data['from']=$routine->from;
                                $data['shift']=$routine->shift;
                        	    
                        	    
                        	    $data['time']=$routine->time;
                                $data['token']=$randomNumber;
                        	    $data['routine_id']=$routine->id;
                                $data['vendor_id']=$routine->bus->user->id;
                        	    // dd($data['date']);
                                //dd($data);
                        	    $result=$this->booking->create($data);
                                $payment['booking_id']=$result->id;
                                $payment['vendor_id']=$result->vendor_id;
                                $payment['counter_id']=$counter_id;
                                $payment['date']=$result->date;
                                
                                BookingPaymentDetails::create($payment);
                        	    if($result){
                        	        $seat=$result->seat;
                        	        if($seat){    
                        	            array_push($seat_name,$seat->seat_name);
                        	        }
                        	    }
                        	}
                        }
                       
                    }	
               
                     
                 }
            }
            // if($seat_name){
            //     $response=$this->sendSmsAfterBooking($randomNumber,$seat_name);
            //     if($response){
            //         if($response->response_code==200){
            //             session()->forget('date');
            //             session()->forget('id');
            //             session()->forget('jointable');
            //             DB::commit();
            //             return redirect()->route('counterBusSearch')->with('message','seat booked successfully');
            //         }else{
            //             $booking=$this->booking->where('token',$randomNumber)->first();
            //             $this->booking->destroy($booking->id);
            //             session()->forget('date');
            //             session()->forget('id');
            //             session()->forget('jointable');
            //             DB::commit();
            //             return redirect()->route('counterBusSearch')->with('message','something went wrong');
            //         }
            //     }else{
            //         $booking=$this->booking->where('token',$randomNumber)->first();
            //         $this->booking->destroy($booking->id);
            //         session()->forget('date');
            //         session()->forget('id');
            //         session()->forget('jointable');
            //         DB::commit();
            //         return redirect()->route('counterBusSearch')->with('message','something went wrong');
            //     }
                

            // }
            
            session()->forget('date');
            session()->forget('id');
            session()->forget('jointable');
            session::forget('sub_destination');
            DB::commit();
            return redirect()->route('counterBusSearch')->with('message','seat booked successfully');
        }else{
            session()->forget('date');
            session()->forget('id');
            session()->forget('jointable');
            session()->forget('sub_destination');
            DB::commit();
            return redirect()->route('counterBusSearch')->with('message','Something went wrong');
        } 
        // $value=Session::get('jointable');
        // $number_of_seats=count($value);
        
        // $key=array_keys($value[0]);
        // $bus=$this->bus->find($key[0]);
        // if($bus){
        //     $j=1;
        //     $empty=[];
        //     foreach($value as $key=>$val){
        //         $seat=BusSeat::find($val[$j]);
        //         if($seat){
        //             $data['bus_id']=$bus->id;
        //             $data['seat_id']=$seat->id;
        //             $data['date']=Session::get('check_date');
        //             $data['booked']=1;
        //             $this->booking->create($data);
        //         }
        //         return redirect()->back();
        //     }
        // }else{
        //     return redirect()->back();
        // }
    }
    public function sendSmsAfterBooking($token,$seat_name){
    	$ch = curl_init();
        $booking=$this->booking->orderBy('created_at','desc')->where('token',$token)->first();
        $value['name'] ='';
        foreach($seat_name as $seat){
                    $value['name'] .= ($value['name']==""?"":",").$seat;
                }

        $message=$booking->name.' seat no '.$value['name'].' has been booked in bus '.$booking->bus->bus_name.'('.$booking->bus->bus_number.')'.'for date '.$booking->date.' form '.$booking->from.' to '.$booking->to.'. Your token is '.$token;
        $args = http_build_query(array('token' => 'pLrVOQeOSHOed96CJrQO', 'from' => 'InfoSMS', 'to' => $booking->phone, 'text' => $message));
        $url = "http://api.sparrowsms.com/v2/sms/";
 
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        return (json_decode($response));
    }
    public function busSearchCounter(Request $request){

        // dd($request->all())
;
        $this->validate($request,['from'=>'required','to'=>'required','date'=>'required','shift'=>'required']);
        $date=explode('-',$request->date);
        $check_date=date('Y-m-d');
        
        $end_date=$this->calendar->get_eng_date($date[0],$date[1],$date[2]);
        $nepali_form_date=$end_date['y'].'-'.$end_date['m'].'-'.$end_date['d'];
        // dd($nepali_form_date, $check_date);
        
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
            session()->forget('sub_destination'); 
            $session_date_set=session()->get('check_date');

            if($session_date_set!=null){
                // dd($request->shift);
            $counterBus=Auth::user()->counter_bus()->where('acceptance_status',1)->where('reject_status',0)->get();
            $buses=[];
            foreach($counterBus as $bus){
                $result=$bus->bus;

                if($result->status=='approved'){

                    array_push($buses,$result);
                }
                
            }
            $value['facilities'] ='';
            $busroutine=[];
            if($buses){

                foreach($buses as $bus){
                    $routine=$bus->busRoutine->where('from',$request->from)->where('to',$request->to)->where('date', '<=', $request->date)->where('shift', 'like', '%'.$request->shift.'%')->first();
                    var_dump($routine);
                    if($routine){
                        array_push($busroutine,$routine);
                    }
                }
            }
            // where('name', 'lilke', '%'.$data . '%')

            // dd($busroutine);

            $from=$request->from;
            $to=$request->to;
            
            $shift=$request->shift;
            // dd($buses);
            $busCategories=$this->buscategory->all();
            $destinations=$this->destination->all();

            return view('admin.counter.busSearchResult',compact('buses','busCategories','from','to','shift','destinations','busroutine'));
        }else{
            return redirect()->back()->with('message','Something went wrong');
            
        }
        }
    }
    public function myVendors(){
        $allVendors=Auth::user()->counters_vendor()->where('acceptance_status',1)->distinct()->get(['vendor_id']);
        
        $vendors=[];
        foreach($allVendors as $vendor){

            $vendor=$this->user->find($vendor->vendor_id);
            
            array_push($vendors, $vendor);

        }
        
        return view('admin.counter.myVendors',compact('vendors'));
    }
    public function myVendorsDetail($id){
        $data=$this->user->findOrFail($id);
        return view('admin.counter.vendorDetail',compact('data'));
    }
    public function vendorBuses($id){
        $buses=$this->bus->where('user_id',$id)->get();
        $year_en = date("Y",time());
        $month_en = date("m",time());
        $day_en = date("d",time());
        $date_ne = $this->calendar->get_nepali_date($year_en, $month_en, $day_en);
        $check_date=$date_ne['y'].'-'.((strlen($date_ne['m']) == 2) ? $date_ne['m'] : "0".$date_ne['m']).'-'.$date_ne['d'];
        return view('admin.counter.vendorBuses',compact('buses','check_date'));
    }
    public function paidBookings(){
        
        $bookings=$this->booking->where('client_id',Auth::user()->id)->orderBy('date','desc')->where('paid',1)->paginate(100);
        return view('admin.counter.paidBookings',compact('bookings'));
    }
    public function pendingBookings(){
        $bookings=$this->booking->where('client_id',Auth::user()->id)->orderBy('date','desc')->where('paid',0)->paginate(100);
        return view('admin.counter.pendingPaymentBooking',compact('bookings'));
    }
    public function paymentBasedOnBus(){
        $counterBus=Auth::user()->counter_bus()->where('acceptance_status',1)->where('reject_status',0)->get();

        return view('admin.counter.paymentBasedOnBus',compact('counterBus'));
    }
    public function paymentBasedOnIndividualBus($id){
        $bookings=$this->booking->where('client_id',Auth::user()->id)->where('bus_id',$id)->where('paid',0)->orderBy('date','desc')->paginate(100);
        return view('admin.counter.paymentIndividualBus',compact('bookings'));
    }
    public function bookingToVendors($id){
        $year_en = date("Y",time());
        $month_en = date("m",time());
        $day_en = date("d",time());
        $date_ne = $this->calendar->get_nepali_date($year_en, $month_en, $day_en);
        $check_date=$date_ne['y'].'-'.((strlen($date_ne['m']) == 2) ? $date_ne['m'] : "0".$date_ne['m']).'-'.$date_ne['d'];
        $paymentDetails=BookingPaymentDetails::where('vendor_id',$id)->where('counter_id',Auth::user()->id)->orderBy('date','desc')->paginate(150);
        $from='';
        $to='';
        $payment_status='';
        return view('admin.counter.bookingToVendors',compact('paymentDetails','id','check_date','from','to','payment_status'));
    }
    public function searchBookingPaymentDetail(Request $request){

        $paymentDetails=BookingPaymentDetails::where('vendor_id',$request->vendor_id)->where('date','>=',$request->from)->where('date','<=',$request->to)->paginate(150);
        $id=$request->vendor_id;
        $from=$request->from;
        $to=$request->to;
        return view('admin.counter.bookingToVendors',compact('paymentDetails','id','from','to'));
    }
    public function counterPaymentToVendor(Request $request){
    	$this->validate($request,['from'=>'required','to'=>'required','payment_status'=>'required']);
    	$counter_id=Auth::user()->id;
    	$id=$request->vendor_id;
        $paymentDetails=BookingPaymentDetails::where('vendor_id',$request->vendor_id)->where('counter_id',$counter_id)->where('date','<=',$request->to)->where('date','>=',$request->from)->where('payment_status',$request->payment_status)->get();
        $total=BookingPaymentDetails::where('vendor_id',$request->vendor_id)->where('counter_id',$counter_id)->where('date','<=',$request->to)->where('date','>=',$request->from)->where('payment_status',$request->payment_status)->sum('price');
        $from=$request->from;
        $to=$request->to;
        $payment_status=$request->payment_status;
        $vendors=$this->user->orderBy('created_at','desc')->where('role','vendor')->where('publish',1)->get();
        
        return view('admin.counter.bookingToVendors',compact('paymentDetails','from','to','searchedVendor','total','payment_status','id'));
    }
    public function bookingHistoryByBus($id){
        $bus = $this->bus->findOrFail($id);
        $counter = Auth::user()->id;
        
        $bookings = $bus->busBooking()->where('counter_id',$counter)->get();
        return view('admin.counter.bookingByBus',compact('bookings','bus'));
    }
    public function passengerListByBus($id){
        $bus = $this->bus->findOrFail($id);
        $year_en = date("Y",time());
        $month_en = date("m",time());
        $day_en = date("d",time());
        $date_ne = $this->calendar->get_nepali_date($year_en, $month_en, $day_en);
        $check_date=$date_ne['y'].'-'.((strlen($date_ne['m']) == 2) ? $date_ne['m'] : "0".$date_ne['m']).'-'.$date_ne['d'];
        $bookings = $bus->busBooking()->where('date',$check_date)->get();
        
        return view('admin.counter.passengerListByBus',compact('check_date','bookings','bus'));
    }
}

