<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Destination\DestinationRepository;
use App\Repositories\Bus\BusRepository;
use App\Repositories\Booking\BookingRepository;
use App\Repositories\BusCategory\BusCategoryRepository;
use App\Models\BusSeat;
use App\Repositories\nepalicalendar\nepali_date;
use App\Repositories\User\UserRepository;
use App\Repositories\BusRoutine\BusRoutineRepository;
use App\Repositories\TempBooking\TempBookingRepository;
use App\Models\BookingPaymentDetails;
use Image;
use Session;
use Carbon\Carbon;
use Cookie;
use Auth;
class DefaultController extends Controller
{
	private $destination;
	public function __construct(DestinationRepository $destination,BusRepository $bus,BookingRepository $booking,BusCategoryRepository $buscategory,nepali_date $calendar,UserRepository $user,BusRoutineRepository $busroutine,TempBookingRepository $tempbooking){
		$this->destination=$destination;
        
		$this->bus=$bus;
        $this->booking=$booking;
        $this->buscategory=$buscategory;
        $this->calendar=$calendar;
        $this->user=$user;
        $this->busroutine=$busroutine;
        $this->tempbooking=$tempbooking;
        
	}
    public function index(){
        // Cookie::queue(Cookie::make('cookieName', 'value', 1));
        session()->forget('date');
        session()->forget('id');
        session()->forget('jointable');
    	$destinations=$this->destination->all();
        return view('front.index', compact('destinations'));
    	// return view('front.index',compact('destinations'))->withCookie('cookieName');
    }
    public function busSearch(Request $request){
        session()->forget('sub_destination');
        $this->validate($request, ['from'=>'required','to'=>'required','date'=>'required','shift'=>'required']);

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
            if($request->shift === 'Both')
                $busRoutine=$this->busroutine->where('from', $request->from)->where('to', $request->to)->where('date', $request->date)->get();
            else
                $busRoutine=$this->busroutine->where('from', $request->from)->where('to', $request->to)->where('date', $request->date)->where('shift', $request->shift)->get();
            
            $buses=[];
            foreach($busRoutine as $routine){
                $bus=$routine->bus;
                if($bus->status=='approved'){
                    array_push($buses,$bus);
                }
                
            }
            
            // $buses=$this->bus->where('from',$request->from)->where('to',$request->to)->where('service_type',$request->shift)->get();
            $value['facilities'] ='';
        
            $from=$request->from;
            $to=$request->to;
            
            $shift=$request->shift;
            // dd($buses);
            $busCategories=$this->buscategory->all();
            $destinations=$this->destination->all();
            return view('front.busSearchResult',compact('buses','busCategories','from','to','shift','destinations'));
        }

        
    }
    public function saveSession(Request $request){
        //checking today's nepali date
        $nepali_date=$this->calendar->get_nepali_date(date('Y'),date('m'),date('d'));
        $todaysNepaliDate=$nepali_date['y'].'-'.((strlen($nepali_date['m']) == 2) ? $nepali_date['m'] : "0".$nepali_date['m']).'-'.((strlen($nepali_date['d']) == 2) ? $nepali_date['d'] : "0".$nepali_date['d']);

        $routine=$this->busroutine->where('id',$request->routine_id)->where('date','>=',$todaysNepaliDate)->first();
        if($routine){
            $booking=$this->booking->where('seat_id',$request->seat_id)->where('bus_id',$routine->bus_id)->where('routine_id',$routine->id)->first();

                if($booking){
                    return response()->json(['status'=>false]);
                }
                $seat=BusSeat::find($request->seat_id);
                $value=Session::get('jointable');

                if($value){
                    foreach($value as $subKey => $subArray){
                        //if routine id is not in session
                        if(key($subArray)!=$request->routine_id){
                            // session::forget('jointable');
                            $joinValue[$request->routine_id] = $request->seat_id;
                            $test = session()->push('jointable', $joinValue);
                            return response()->json(['status'=>true,'bus_id'=>$routine->bus_id]);
                        }else{

                            if($subArray[$request->routine_id] == $request->seat_id){
                               return response()->json(['status'=>false]);
                            }else{
                               $joinValue[$request->routine_id] = $request->seat_id;
                               $test = session()->push('jointable', $joinValue);
                               return response()->json(['status'=>true,'bus_id'=>$routine->bus_id]);
                            }
                        }
                    }
                }else{
                    $joinValue[$request->routine_id] = $request->seat_id;
                    $test = session()->push('jointable', $joinValue);
                    return response()->json(['status'=>true,'bus_id'=>$routine->bus_id]);
                    // return $seat;
                }           
                
        }else{
            return response()->json(['status'=>false]);
            
        }    
    }
    
    public function removeSession(Request $request){
        
        $validator = \Validator::make($request->all(), [
            'bus_id' => 'required|numeric',
            'seat_id' => 'required|numeric',
            'routine_id' =>'required|numeric'

            
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $nepali_date=$this->calendar->get_nepali_date(date('Y'),date('m'),date('d'));
        $todaysNepaliDate=$nepali_date['y'].'-'.((strlen($nepali_date['m']) == 2) ? $nepali_date['m'] : "0".$nepali_date['m']).'-'.((strlen($nepali_date['d']) == 2) ? $nepali_date['d'] : "0".$nepali_date['d']);

        $routine=$this->busroutine->where('id',$request->routine_id)->where('date','>=',$todaysNepaliDate)->first();
        if($routine){
            $booking=$this->booking->where('seat_id',$request->seat_id)->where('bus_id',$routine->bus_id)->where('routine_id',$routine->id)->first();
            if($booking){
                return response()->json(['errors'=>'alerad booked']);
            }
            $joinValue[$request->routine_id] = $request->seat_id;
            // return $joinValue;
            $value=Session::get('jointable');
            $array = $this->removeElementWithValue($value, $request->routine_id, $request->seat_id);
             // return $array;
            $reindexed_array = array_values($array);
            session()->forget('jointable');
            session()->put('jointable',$reindexed_array);
            return response()->json(['status'=>true,'price'=>$routine->price,'array'=>$reindexed_array]);
        }else{
            return response()->json(['status'=>false]);
        }
        

    }
    public function removeElementWithValue($array, $key, $value){
         
        foreach($array as $subKey => $subArray){
            if(key($subArray)==$key){
                if($subArray[$key] == $value){
                    
                   unset($array[$subKey]);
                }
            }
            
        }
        return $array;
    }
    public function saveSubDestinationPrice(Request $request){
        $routine=$this->busroutine->find($request->routine_id);

        if($routine){
            $subDestination=$routine->subDestinations()->where('id',$request->id)->first();
            
            session::forget('sub_destination');
            
            $input=array($request->routine_id=>$subDestination);
            
            session::put('sub_destination',$input);
            return response()->json(['status'=>true,'sub_destination_price'=>$subDestination->sub_price]);

        }else{
            return response()->json(['status'=>false]);
        }
    }
    
    public function book_now($id){

        $routine=$this->busroutine->find($id);
        $value=Session::get('jointable');
        $sub_destination=Session::get('sub_destination');
        
        $check_routine_id='';
        $sub_destination_price='';
        if($sub_destination){
            foreach($sub_destination as $key=>$sub){
                
                $check_routine_id=$key;
                $sub_destination_price=$sub->sub_price;
                
            }
        }
        
        
        if($routine && $value){
            session()->put('id',$id);
            
            $total_price=0;
            $seatName='';

            foreach($value as $key=>$val){
                 
                 $keys=array_keys($val);
                 ;
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
            
            
            return view('front.bookNow',compact('seatName','total_price'));
        }else{
            return redirect()->route('home');
        } 
    }
    
    public function seatBooking(Request $request){

        $nepali_date=$this->calendar->get_nepali_date(date('Y'),date('m'),date('d'));
        $todaysNepaliDate=$nepali_date['y'].'-'.((strlen($nepali_date['m']) == 2) ? $nepali_date['m'] : "0".$nepali_date['m']).'-'.((strlen($nepali_date['d']) == 2) ? $nepali_date['d'] : "0".$nepali_date['d']);
        
        
        if(preg_match('/([9][8][46][0-9]{7})/', $request->phone) || preg_match('/([9][8][0-2][0-9]{7})/', $request->phone) || preg_match('/([9][6][0-9]{8}|[9][8][8][0-9]{7})/', $request->phone) || preg_match('/([9][8][5][0-9]{7})/', $request->phone)){
                    
            $id=Session::get('id');

            $value=Session::get('jointable');
            $routine=$this->busroutine->find($id);
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            $randomNumber=substr(str_shuffle($permitted_chars), 0, 63);

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
            
            Session::put('token',$randomNumber);
            Cookie::make('_lkghg',$randomNumber,0);
            if($routine && $value){
                    Session::put('id',$id);
                    $total_price=0;
                    $seatName='';

                    foreach($value as $key=>$val){
                         
                        $keys=array_keys($val);
                        if($keys[0]==$id){
                            $total_price+=$routine->price;
                            if(Auth::guard('admin')->check()){
                                $client_id=Auth::guard('admin')->user()->id;
                            }else{
                                $client_id='';
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
                                    return redirect()->route('home');
                                }else{
                                    if($seat){
                                        $data['bus_id']=$routine->bus->id;
                                        $data['seat_id']=$seat->id;
                                        $data['routine_id']=$routine->id;
                                        $data['date']=$routine->date;
                                        $data['name']=$request->name;
                                        $data['client_id']=$client_id;
                                        $data['booked_on']=$todaysNepaliDate;
                                        $data['pickup_station']=$request->pickup_station;
                                        $data['price']=$routine->price;
                                        $data['sub_destination']=null;
                                        $data['online_payment']=1;
                                        if($sub_destination_price){
                                            //if routine id is different form sub_destination routine_id

                                            //sometimes prviously selected sub destination remains
                                            if($check_routine_id==$id){
                                                
                                                
                                                $data['price']=$sub_destination_price;
                                                $payment['price']=$sub_destination_price;
                                                $data['drop_station']=$sub_destination_name;
                                                $data['sub_destination']=$sub_destination_name;
                                            }else{
                                                
                                                $data['price']=$routine->price;
                                                $data['drop_station']=$request->drop_station;
                                                $payment['price']=$result->price;
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
                                        
                                        $data['vendor_id']=$routine->bus->user->id;
                                        
                                        $data['paid']=1;
                                        $result=$this->booking->create($data);
                                        $payment['booking_id']=$result->id;
                                        $payment['vendor_id']=$result->vendor_id;
                                        $payment['date']=$result->date;
                                        
                                        BookingPaymentDetails::create($payment);
                                        // $this->tempbooking->create($data);

                                    }else{
                                        return redirect()->route('home');
                                    }
                                }
                                
                            }
                        }else{
                             return redirect()->route('home')->withCookie('_lkghg',$randomNumber);
                        }
                    }
                session()->forget('date');
                session()->forget('id');
                session()->forget('jointable');
                $booking=$this->tempbooking->where('token',$randomNumber)->sum('price');
                $newPrice=$booking;
                return redirect()->route('home')->with('message','booking made successfully');
                // return redirect()->route('payment')->with(['amount'=>$newPrice,'booking'=>$booking]);
            }else{
                session()->forget('date');
                session()->forget('id');
                session()->forget('jointable');
                if(Auth::guard('admin')->check()){
                    return redirect()->route('account');
                }
                return redirect()->route('home');
            } 
        }else{
            return redirect()->back()->with('message','Invalid phone number');
        }
        
    }
    public function checkSession(){
        $value=Session::get('jointable');
        dd($value);
    }
    public function selectBusByCategory(Request $request){
        // session()->forget('jointable');
        // $category=$this->buscategory->find($request->id);
        // $buses=$category->bus;

        // return view('front.busByCategory',compact('buses'));
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
                    if($request->id)
                        $bus=$routine->bus()->where('bus_category',$request->id)->where('status','approved')->first();
                    else
                        $bus=$routine->bus()->where('status','approved')->first();
                        
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
    public function userRegister(){
        return view('front.user.register');
    }
    public function counterRegister(){
        return view('front.counterRegister');
    }
    public function vendorRegister(){
        return view('front.vendorRegister');
    }
    public function registerCounter(Request $request){
        $message=['pan.required'=>'pan number is required','passport_image.required'=>'personal image is required','citizen_back.required'=>'Back copy of citizenship is required','citizen_front.required'=>'Front copy of citizenship is required'];
        $rules=[
            'name'=>'required|min:4',
            'company_name'=>'required|min:6',
            'address'=>'required',
            'company_phone'=>'required',
            'company_reg_no'=>'required',
            'company_image'=>'required',
            'pan'=>'required',
            'pan_image'=>'required',

            'email'=>'unique:users|email',

            'passport_image'=>'required|dimensions:max_width=250,max_height=250',
            'password' => 'required|confirmed|min:6',
            'citizen_no'=>'required',
            'citizen_front'=>'required',
            'citizen_back'=>'required|',
        ];
        $this->validate($request,$rules,$message);
        $value=$request->except('confirm_password','pan_image','company_image');
        $value['password']=bcrypt($request->password);
        $value['role']='counter';
        $value['phone']=$request->phone;
        $value['publish']=0;
       

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
        if($request->passport_image){
            $documents=$request->file('passport_image');
            $filename=time().'.'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['passport_image']=$filename;
            
        }
        if($request->citizen_front){
            $documents=$request->file('citizen_front');
            $filename=time().'.'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['citizen_front']=$filename;
            
        }
        if($request->citizen_back){
            $documents=$request->file('citizen_back');
            $filename=time().'.'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['citizen_back']=$filename;
            
        }
        
        
        $this->user->create($value);
        return redirect()->route('home')->with('message','Counter added successfully.');
    }
    public function registerVendor(Request $request){

        $message=['pan.required'=>'pan number is required','passport_image.required'=>'personal image is required','citizen_back.required'=>'Back copy of citizenship is required','citizen_front.required'=>'Front copy of citizenship is required'];
        $rules=[
            'name'=>'required|min:4',
            'company_name'=>'required|min:6',
            'address'=>'required',
            'company_phone'=>'required',
            'company_reg_no'=>'required',
            'company_image'=>'required|dimensions:max_width=2500,max_height=2500',
            'pan'=>'required',
            'pan_image'=>'required|dimensions:max_width=2500,max_height=2500',

            'email'=>'unique:users|email',

            'passport_image'=>'required|dimensions:max_width=250,max_height=250',
            'password' => 'required|confirmed|min:6',
            'citizen_front'=>'required|dimensions:max_width=2500,max_height=2500',
            'citizen_back'=>'required|dimensions:max_width=2500,max_height=2500',

        ];
        $this->validate($request,$rules,$message);
        $value=$request->except('confirm_password','pan_image','company_image');
        $value['password']=bcrypt($request->password);
        $value['role']='vendor';
        $value['phone']=$request->phone;
        $value['publish']=0;
       

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
        if($request->passport_image){
            $documents=$request->file('passport_image');
            $filename=time().'.'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['passport_image']=$filename;
            
        }
        if($request->citizen_front){
            $documents=$request->file('citizen_front');
            $filename=time().'.'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['citizen_front']=$filename;
            
        }
        if($request->citizen_back){
            $documents=$request->file('citizen_back');
            $filename=time().'.'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['citizen_back']=$filename;
            
        }
        
        
        $this->user->create($value);
        return redirect()->route('home')->with('message','Vendor added successfully.');
    }
    public function loginView(){
        dd('login');
    }
    public function test(){


        // $client = new \GuzzleHttp\Client();

        $url = "https://khalti.com/api/payment/initiate/";
       
       
        $args = http_build_query(array('public_key' => 'test_public_key_fdab9e1a4a6a4cf3a0fb18ac9ec1abec', 'mobile' => '9860006013', 'product_identity' => 'asdfasdf', 'product_name' => 'new product', 'amount' => '90000'));


    // $url2 = "https://khalti.com/api/payment/confirm/";
    $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   // Response
   $response = curl_exec($ch);
   $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
   curl_close($ch);
   

  
   dd($response);
    
    }

    public function test2()
    {
          $url2 = "https://khalti.com/api/payment/confirm/";
  

   $args2 =[
    'public_key' => 'test_public_key_fdab9e1a4a6a4cf3a0fb18ac9ec1abec',
    'token' => 'kYYFT3rxBHimUdAVXeaNNJ',
    'confirmation_code' => '825692',
    "transaction_pin" => '1234',
   ];



              $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url2);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS,$args2);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   // Response
   $response = curl_exec($ch);
   $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
   curl_close($ch);

   return $response;    
    }

    public function verify(Request $request)
    {
        $args = http_build_query(array('token' => $request->token,'amount'  => $request->amount));
        $url = "https://khalti.com/api/v2/payment/verify/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $headers = ['Authorization: Key test_secret_key_6d39e14a935c4ba183c02bbbc4f06fed'];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Response
        
        $response = curl_exec($ch);
        // $parsed = array();
        // parse_str($response, $parsed);

        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $test = json_decode($response);
        if($test->state->name=="Completed" && $test->state->template=="is complete"){
            $token=Session::get('token');
            $value=$this->tempbooking->where('token',$token)->get();
            $seat_name=[];
            foreach($value as $value){
                $data['token']=$value->token;
                $data['bus_id']=$value->bus_id;
                $data['seat_id']=$value->seat_id;
                $data['routine_id']=$value->routine_id;
                $data['client_id']=$value->client_id;
                $data['book_no']=$value->book_no;
                $data['booked_on']=$value->booked_on;
                $data['name']=$value['name'];
                $data['phone']=$value['phone'];
                $data['pickup_station']=$value['pickup_station'];
                $data['drop_station']=$value['drop_station'];
                $data['from']=$value['from'];
                $data['price']=$value['price'];
                $data['time']=$value['time'];
                $data['to']=$value['to'];
                $data['shift']=$value['shift'];
                $data['date']=$value['date'];
                
                $result=$this->booking->create($data);
                if($result){
                    $seat=$result->seat;
                    if($seat){    
                        array_push($seat_name,$seat->seat_name);
                    }
                }
            }
            $this->sendSmsAfterBooking($token,$seat_name);
            return "success";


        }else{
            return "failed";   
        }
        
        // return ;
        
    }
    public function payment(){
        $amount=20;
        $refId='asdf0a36r0';
        $token_responses = $this->getToken($amount,$refId);
        $token_response = json_decode($token_responses);

        // ImeTransaction::create([
        //     'MerchantCode' => self::$merchantcode,
        //     'TranAmount' => $token_response->Amount,
        //     'RefId' => $token_response->RefId,
        //     'TokenId' => $token_response->TokenId,
        // ]); //store in table
        $merch_code = 'EASYBUS';
        return view('front.imePay', compact('token_response', 'merch_code'));
        //khalti
        // $token=Session::get('token');
        // $value=$this->tempbooking->where('token',$token)->first();
        // if($value){
        //     return view('front.paymentView');
        // }else{
        //     return redirect()->route('home');
        // }
    }
    public function getToken($amt,$ref_id){
        $username='easybus';
        $password='easybus123';
        $data = ["MerchantCode" => 'EASYBUS', "Amount" => $amt, "RefId" => $ref_id];
        $header_array = [];
        $header_array[] = "Authorization: Basic ".base64_encode($username.":".$password);
        $header_array[] = "Module: ".base64_encode('EASYBUS');
        $header_array[] = "Content-Type: application/json";
        // Initializing a cURL session
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://202.166.194.123:7979/api/Web/GetToken');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header_array);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
    public function sendSmsAfterBooking($token,$seat_name){
        $ch = curl_init();
        $booking=$this->booking->orderBy('created_at','desc')->where('token',$token)->first();
        $value['name'] ='';
        foreach($seat_name as $seat){
                    $value['name'] .= ($value['name']==""?"":",").$seat;
                }

        $message=$booking->name.' seat no '.$value['name'].' has been booked in bus '.$booking->bus->bus_name.'('.$booking->bus->bus_number.')'.'for date '.$booking->date.' form'.$booking->from.' to'.$booking->to.'. Your token is '.$token;
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

    }
    public function success(){
        
        return "succcess";
    }
    public function imePay(){
        return view('admin.ime.pay');
    }

}
    