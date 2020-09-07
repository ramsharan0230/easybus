<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Repositories\Booking\BookingRepository;
use App\Repositories\User\UserRepository;
use App\Models\BookingPaymentDetails;
use App\Repositories\Bus\BusRepository;
use App\Repositories\BusCategory\BusCategoryRepository;
use Carbon;
use Auth;
use App\User;
use App\Models\Bus;
use DB;

class ReportController extends Controller
{
	public function __construct(BookingRepository $booking,UserRepository $user,BusRepository $bus,BusCategoryRepository $bus_category){
		$this->booking=$booking;
		$this->user=$user;
        $this->bus=$bus;
        $this->bus_category=$bus_category;
	}
    public function passengerReport(){
    	
    	return view('admin.report.passengerReport');
    }
    public function ticketReport(){
    	$week_days=$this->dates_of_week();
    	$month_days=$this->dates_of_month();
    	// dd($month_days);
    	$weekly_ticket_total=[];
    	$monthly_ticket_total=[];
    	foreach($week_days['date'] as $date){
    		$tickets=$this->booking->whereDate('created_at',$date)->get();

    		array_push($weekly_ticket_total, count($tickets));
    	}
    	foreach($month_days['date'] as $date){
    		$tickets=$this->booking->whereDate('created_at',$date)->get();

    		array_push($monthly_ticket_total, count($tickets));
    	}
    	
    	return view('admin.report.ticketReport',compact('week_days','weekly_ticket_total','month_days','monthly_ticket_total'));
    }
    public function vendorReport(){
    	
    	return view('admin.report.vendorReport');
    }
    public function incomeReport(){
    	$week_days=$this->dates_of_week();
    	$month_days=$this->dates_of_month();
    	// dd($month_days);
    	$weekly_income_total=[];
    	$monthly_income_total=[];
    	foreach($week_days['date'] as $date){
    		$tickets=$this->booking->whereDate('created_at',$date)->get();
    		$sum=0;
    		foreach($tickets as $ticket){
    			$sum+=$ticket->bus->price;
    		}
    		array_push($weekly_income_total, $sum);
    	}
    	foreach($month_days['date'] as $date){
    		$tickets=$this->booking->whereDate('created_at',$date)->get();
    		$sum=0;
    		foreach($tickets as $ticket){
    			$sum+=$ticket->bus->price;
    		}
    		array_push($weekly_income_total, $sum);
    	}
    	return view('admin.report.incomeReport',compact('week_days','month_days','weekly_income_total','monthly_income_total'));
    }
    public function dates_of_week(){
    	$date = Carbon\Carbon::today();
    	$num=date('N');
    	// parse about any English textual datetime description into a Unix timestamp 
		$ts = strtotime($date);
		// find the year (ISO-8601 year number) and the current week
		$year = date('o', $ts);
		$week = date('W', $ts);
		// print week for the current date
		$day_name=[];
		$day_date=[];
		for($i = 0; $i <= $num; $i++) {
    		// timestamp from ISO week date format
    		$ts = strtotime($year.'W'.$week.$i);
    		$day=date("l", $ts);
    		$daydate=date("Y-m-d ", $ts);
    		array_push($day_name,$day);
    		array_push($day_date,$daydate);
		}
		return $data=['day'=>$day_name,'date'=>$day_date];	
    }
    public function dates_of_month(){
    	$date = Carbon\Carbon::today();
    	$num=date('m');
    	$month = date('m');
		$year = date('Y');

		$start_date = "01-".$month."-".$year;
		$start_time = strtotime($start_date);

		$end_time = strtotime("+1 month", $start_time);
		$day_name=[];
		$day_date=[];
		for($i=$start_time; $i<$end_time; $i+=86400)
		{
		   	$day = date('l', $i);
		   	$daydate=date('Y-m-d', $i);
		   	array_push($day_name,$day);
    		array_push($day_date,$daydate);
		}
		return $data=['day'=>$day_name,'date'=>$day_date];
    }
    public function payToVendor(){
        $paymentDetails=[];
        $from='';
        $to='';
        $total='';
        $searchedVendor='';
        $payment_status='';
        $vendors=$this->user->orderBy('created_at','desc')->where('role','vendor')->where('publish',1)->get();
        return view('admin.admin.payToVendor',compact('paymentDetails','from','to','vendors','searchedVendor','total','payment_status'));
    }
    public function paymentToVendor(Request $request){
        $this->validate($request,['from'=>'required','to'=>'required','vendor'=>'required','payment_status'=>'required']);

        $paymentDetails=BookingPaymentDetails::where('vendor_id',$request->vendor)->where('counter_id',null)->where('date','<=',$request->to)->where('date','>=',$request->from)->where('payment_status',$request->payment_status)->get();
        $total=BookingPaymentDetails::where('vendor_id',$request->vendor)->where('counter_id',null)->where('date','<=',$request->to)->where('date','>=',$request->from)->where('payment_status',$request->payment_status)->sum('price');
        $from=$request->from;
        $to=$request->to;
        $searchedVendor=$request->vendor;
        $payment_status=$request->payment_status;
        $vendors=$this->user->orderBy('created_at','desc')->where('role','vendor')->where('publish',1)->get();
        return view('admin.admin.payToVendor',compact('paymentDetails','from','to','vendors','searchedVendor','total','payment_status'));
    }
    public function markAsPaid(Request $request){
        $datas=DB::table("booking_payment_details")->whereIn('id',explode(",",$request->ids))->update(array('payment_status' => 1));
        
        return "success";
    }
    public function vehicleReport(){
        return view('admin.report.vehicleReport');
    }
    public function bookingReports(){
        $bookingReports=$this->booking->orderBy('date','desc')->with('bus')->get();
        $buses=$this->bus->where('status','approved')->get();
        return view('admin.report.bookingReports',compact('bookingReports','buses'));
    }
    public function counterBookedSeats(){
        $bookingReports=$this->booking->orderBy('date','desc')->with('bus','counter')->where('counter_id','!=',null)->get();
        $buses=$this->bus->where('status','approved')->get();
        return view('admin.report.counterBookedSeats',compact('bookingReports','buses'));
    }
    public function onlineBookedSeats(){
        $bookingReports=$this->booking->orderBy('date','desc')->where('paid',1)->with('bus')->get();
        $buses=$this->bus->where('status','approved')->get();
        return view('admin.report.onlineBookedSeats',compact('bookingReports','buses'));
    }
    public function registeredVehicles(){
        $details=$this->bus->where('status','approved')->orderBy('created_at','desc')->get();
        return view('admin.report.registeredVehicles',compact('details'));
    }
    public function categoryReport(){
        $details=$this->bus_category->orderBy('created_at','desc')->get();
        return view('admin.report.categoryReport',compact('details'));
    }
    public function busListReport($id){
        $category=$this->bus_category->findOrFail($id);
        $buses=$category->bus()->orderBy('created_at','desc')->where('status','approved')->get();
        return view('admin.report.categoryBusList',compact('category','buses'));
    }
    public function counter_of_vendor($id){
        $vendor=User::with(['vendors_counter'=>function($query){
            $query->where('acceptance_status',1)
            ->groupby(['sender_id'])->get();
        }])->find($id);
        
        $counters=[];
        foreach($vendor->vendors_counter as $counter){
            $counter=$this->user->find($counter->sender_id);
            array_push($counters, $counter);

        }
       
        return view('admin.report.counter_of_vendor',compact('counters'));
    }
    public function vendorBuses($id){
        $details=User::with(['buses'=>function($query){
            $query->where('status','approved')->get();
        }])->findOrFail($id);
        
        return view('admin.report.vendorBuses',compact('details'));
    }
    public function vendorBusTickets($id){
        $bus=Bus::with('busBooking.bus')->find($id);
        
        return view('admin.report.vendorBusTickets',compact('bus'));
    }
    public function vendorIndividualBusticketOnline(Request $request){
        
    }
    public function vendorsAssistant($id){

        $details=User::with(['assistants'=>function($query){
            $query->get();
        }])->findOrFail($id);
        
        return view('admin.report.vendorsAssistant',compact('details'));
    }
    public function vendorTickets($id){
        $details=User::with('vendor_bookings')->findOrFail($id);
        return view('admin.report.vendorTickets',compact('details'));
        
    }
    public function vendorOnlineTicket(Request $request){
        $online=$request->online;
        $counter=$request->counter;
        if($online==1){
            $bookingReports=$this->booking->where('vendor_id',$request->vendor_id)->orderBy('date','desc')->where('counter_id',null)->with('bus')->get();
        }
        if($counter==1){
            $bookingReports=$this->booking->where('vendor_id',$request->vendor_id)->orderBy('date','desc')->where('counter_id','!=',null)->with('bus')->get();
        }
        return response()->json(['message'=>true,'html'=>view('admin.report.include.searchPassengerByDate',compact('bookingReports','counter'))->render()]);


    }
    public function searchPassengerByDate(Request $request){

        $counter=$request->counter;
        $online=$request->online;
        if($counter==1){
            $bookingReports=$this->booking->where('date',$request->date)->where('counter_id','!=',null)->with('counter','bus')->get();
        }elseif($online==1){
            $bookingReports=$this->booking->where('date',$request->date)->where('paid',1)->with('counter','bus')->get();
        }

        else{
            $bookingReports=$this->booking->where('date',$request->date)->with('counter','bus')->get();
        }
        
        return response()->json(['message'=>true,'html'=>view('admin.report.include.searchPassengerByDate',compact('bookingReports','counter'))->render()]);
    }
    public function searchPassengerByBus(Request $request){
        $counter=$request->counter;
        $online=$request->online;
        if($counter==1){
            $bookingReports=$this->booking->where('bus_id',$request->bus_id)->where('counter_id','!=',null)->with('counter','bus')->orderBy('date','desc')->get();

        }
        elseif($online==1){
            $bookingReports=$this->booking->where('bus_id',$request->bus_id)->orderBy('date','desc')->where('paid',1)->with('bus')->get();
        }else{
            $bookingReports=$this->booking->where('bus_id',$request->bus_id)->with('counter','bus')->orderBy('date','desc')->get();
        }

        return response()->json(['message'=>true,'html'=>view('admin.report.include.searchPassengerByDate',compact('bookingReports','counter'))->render()]);
    }
    public function approvedBustickets($id){
        $bus=Bus::with('busBooking.bus','busBooking.counter')->findOrFail($id);
        
        return view('admin.report.approvedBustickets',compact('bus'));

    }
    public function individualBusTickets(Request $request){
        // dd($request->all());
        $bus=$this->bus->findOrFail($request->bus_id);
        $counter=$request->counter;
        if($bus){
            if($request->counter==1){
                $bookingReports=$this->booking->where('bus_id',$request->bus_id)->orderBy('date','desc')->where('counter_id','!=',null)->with('bus','counter')->get();

            }
            if($request->online==1){
                
                $bookingReports=$this->booking->where('bus_id',$request->bus_id)->orderBy('date','desc')->where('paid',1)->with('bus')->get();
            }
            return response()->json(['message'=>true,'html'=>view('admin.report.include.busTicket',compact('bookingReports','counter'))->render()]);
        }
        return response()->json(['message'=>false]);
        
    }
    public function vendor_of_counters($id){
        $counter=$this->user->findOrFail($id);
        $allVendors=$counter->counters_vendor()->where('acceptance_status',1)->distinct()->get(['vendor_id']);
        $vendors=[];
        foreach($allVendors as $vendor){

            $vendor=$this->user->find($vendor->vendor_id);
            
            array_push($vendors, $vendor);

        }
        return view('admin.report.counterVendors',compact('vendors','counter'));
    }
    public function counter_bus_list($id){
        $allBuses=User::with(['counter_bus'=>function($query){
            $query->where('acceptance_status',1)->where('reject_status',0)->get();
        }])->findOrFail($id);
        
        return view('admin.report.counterBuses',compact('allBuses'));
    }
    public function counterBusTickets($id){
        
        $bus=Bus::with(['busBooking'=>function($query){
            $query->orderBy('date','desc')->where('counter_id','!=',null)->with('bus','counter')->get();
        }])->findOrFail($id);
        return view('admin.report.counterBusTicket',compact('bus'));
    }
}
