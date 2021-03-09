<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use App\Repositories\Booking\BookingRepository;
use App\Repositories\Bus\BusRepository;
use App\Repositories\Advertisement\AdvertisementRepository;
use App\Repositories\BusCategory\BusCategoryRepository;
use MilanTarami\NepaliCalendar\Facades\NepaliCalendar;
use Illuminate\Support\Facades\Input;
use App\Models\Client;
use App\Models\BusCategory;
use Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
	public function __construct(UserRepository $user,BookingRepository $booking,BusRepository $bus,AdvertisementRepository $advertisement){
		$this->user=$user;
        $this->booking=$booking;
        $this->bus=$bus;
        $this->advertisement=$advertisement;
	}
    public function allCounters(){
        $details=$this->user->orderBy('created_at','desc')->where('role','counter')->where('publish',1)->get();
        // dd($details);
    	return view('admin.admin.allCounters',compact('details'));
    }
    public function allAssistants(){
        $details=$this->user->orderBy('created_at','desc')->where('role','assistant')->get();
    	return view('admin.admin.allAssistants',compact('details'));
    }
    public function allPassengers(){
        $details=$this->booking->orderBy('date','desc')->with('bus','seat')->get();
        $buses=$this->bus->where('status','approved')->get();
        return view('admin.admin.allPassengers',compact('details','buses'));
    }
    public function counterDetail($id){
        $data=$this->user->find($id);
        return view('admin.admin.counterDetail',compact('data'));
    }
    public function counterTicketIssued($id){
        $bookings=$this->booking->where('client_id',$id)->where('online_payment',0)->orderBy('date','desc')->get();
        $counter=Auth::user()->findOrFail($id);
        //dd($counter);
        $buses=$counter->counter_bus()->where('acceptance_status',1)->where('reject_status',0)->get();
        return view('admin.admin.counterTicketIssued',compact('bookings','counter','buses'));
    }
    public function allBuses(){
        $details=$this->bus->orderBy('created_at','desc')->get();
        $busCategories = BusCategory::orderBy('created_at','desc')->get();
        return view('admin.admin.allBuses', compact('details', 'busCategories'));
    }
    public function newBuses(){
        $details=$this->bus->where('status','new')->orderBy('created_at','desc')->get();
        return view('admin.admin.newBuses',compact('details'));
    }
    public function approveBus($id){
        $bus=$this->bus->findOrFail($id);
        $bus->status='approved';
        $bus->save();
        return redirect()->back()->with('message','Bus Approved');
    }
    public function approvedBuses(){
        if(Input::get('bus-type')==null)
            $details=$this->bus->where('status','approved')->orderBy('created_at','desc')->get();
        else
            $details=$this->bus->where('status','approved')->where('bus_category', Input::get('bus-type'))->orderBy('created_at','desc')->get();

        $busCategories = BusCategory::orderBy('created_at','desc')->get();

        return view('admin.admin.approvedBus',compact('details', 'busCategories'));
    }
    
    public function busDetail($id){
        $bus=$this->bus->findOrFail($id);
        return view('admin.admin.busLayout',compact('bus'));
    }
    public function busSeatLayout($id){
        $bus=$this->bus->findOrFail($id);
        return view('admin.admin.busLayout',compact('bus'));
    }
    
    public function rejectedBus(){
        $details=$this->bus->where('status','rejected')->orderBy('created_at','desc')->get();
        return view('admin.admin.rejectedBus',compact('details'));
    }
    public function suspendedBus(){
        $details=$this->bus->where('status','suspended')->orderBy('created_at','desc')->get();
        return view('admin.admin.suspendedBus',compact('details'));
    }
    public function rejectBus($id){
        $bus=$this->bus->findOrFail($id);
        $bus->status='rejected';
        $bus->save();
        return redirect()->back()->with('message','Bus Rejected');
    }

    public function suspendBus($id){
        $bus=$this->bus->findOrFail($id)->update(['status'=>'suspended']);
        return redirect()->back()->with('message','Bus Suspended');
    }

    public function busTicketHistory($id){
        // dd(Carbon::now());
        // dd(NepaliCalendar::today());
        // $bsDate = NepaliCalendar::BS2AD('20-10-2076', [
        //     'date_format' => 'DD-MM-YYYY'
        // ]);
        // dd($bsDate);
        // dd(Carbon::now());
        $bus = $this->bus->findOrFail($id);
        $bookingTicketHistories = $bus->busBooking()->where('bus_id', $bus->id)
        ->where('booked_on', '<=', NepaliCalendar::today())->get();

        return view('admin.admin.ticketHistory', compact('bookingTicketHistories'));
    }

    public function busBookings($id){
        $bus = $this->bus->findOrFail($id);
        $bookingTicketHistories = $bus->busBooking()->where('bus_id', $bus->id)
        ->where('booked_on', '>=', NepaliCalendar::today())->get();

        return view('admin.admin.ticketHistory', compact('bookingTicketHistories'));
    }

    public function busAdvertisement($bus_id){
        $busid=$bus_id;
        return view('admin.admin.advertCreate', compact('busid'));
    }
    public function saveAdvertisement(Request $request){
        $this->validate($request,['title'=>'required']);
        $bus=$this->bus->findOrFail($request->bus_id);
        $data=$request->except('image');
        if($request->image){
            $documents=$request->file('image');
            
            $filename=time().'.advert'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $data['image']=$filename;
            
        }
        
        $this->advertisement->create($data);
        return redirect()->route('advertisementList',$bus->id)->with('message','Advertisement Added Successfully');
    }
    public function advertisementList($busid){
        $bus=$this->bus->findOrFail($busid);
        $details=$bus->advertisements;
        return view('admin.admin.advertisementList',compact('bus','details'));
    }
    public function editAdvertisement($advertid){
        $detail=$this->advertisement->findOrFail($advertid);
        return view('admin.admin.advertEdit',compact('detail'));
    }
    public function updateAdvertisement(Request $request,$advertid){
        $data=$request->except('image');
        if($request->image){
            $documents=$request->file('image');
            
            $filename=time().'.advert'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $data['image']=$filename;
            
        }
        // dd($request->bus_id);
        $this->advertisement->update($data,$advertid);
        return redirect()->route('advertisementList',$request->bus_id)->with('message','Advertisement Updated Successfully');

    }
    public function deleteAdvertisement(Request $request){
        dd($id);
        $advert=$this->advertisement->findOrFail($id);
        $advert->delete();
        return redirect()->back()->with('message','Advertisement Deleted Sccessfully');
    }
}
