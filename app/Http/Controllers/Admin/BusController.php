<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Bus\BusRepository;
use App\Repositories\Destination\DestinationRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\BusCategory\BusCategoryRepository;
use App\Repositories\Booking\BookingRepository;
use App\Repositories\BusRoutine\BusRoutineRepository;
use App\Repositories\nepalicalendar\nepali_date;
use Image;
use Auth;

class BusController extends Controller
{
    public function __construct(BusRepository $bus,DestinationRepository $destination,BusCategoryRepository $category,BookingRepository $booking,nepali_date $calendar,BusRoutineRepository $routine){
        $this->bus=$bus;
        $this->destination=$destination;    
        $this->category=$category;
        $this->booking=$booking;
        $this->calendar = $calendar;
        $this->routine = $routine;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $year_en = date("Y",time());
        $month_en = date("m",time());
        $day_en = date("d",time());
        $date_ne = $this->calendar->get_nepali_date($year_en, $month_en, $day_en);
        $check_date=$date_ne['y'].'-'.((strlen($date_ne['m']) == 2) ? $date_ne['m'] : "0".$date_ne['m']).'-'.$date_ne['d'];
        $details=$this->bus->orderBy('created_at','desc')->where('user_id',$user->id)->get();
        
        return view('admin.bus.list',compact('details','check_date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $driver=Auth::user()->assistants()->where('category','driver')->get();
        $conductor=Auth::user()->assistants()->where('category','conductor')->get();
        $destinations=$this->destination->get();
        $categories=$this->category->all();
        return view('admin.bus.create',compact('destinations','driver','categories','conductor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=['facilities.regex'=>'format of facilities(wifi,water,ac)'];
        $this->validate($request,['bus_number'=>'required','bus_category'=>'required','row'=>'required|numeric','column'=>'required|numeric','facilities'=>'required|regex:/[,]+/','image_1'=>'required|dimensions:max_width=2500,max_height=2000','image_2'=>'required||dimensions:max_width=2500,max_height=2000'],$message);
        $value=$request->except('image','publish');
        $value['publish']=is_null($request->publish)? 0 : 1 ;
        if($request->image_1){
            $image=$this->imageProcessing($request->file('image_1'));
            $value['image_1']=$image;
        }
        if($request->image_2){
            $image=$this->imageProcessing($request->file('image_2'));
            $value['image_2']=$image;
        }
        if($request->image_3){
            $image=$this->imageProcessing($request->file('image_3'));
            $value['image_3']=$image;
        }
        $value['user_id']=Auth::user()->id;

        $driver=$this->bus->where('assistant_1',$request->assistant_1)->first();
        $conductor=$this->bus->where('assistant_2',$request->assistant_2)->first();
        if($driver){
            $driver['assistant_1']=null;
            $driver->save();
        }
        if($conductor){
            $conductor['assistant_2']=null;
            $conductor->save();
        }
        $id=$this->bus->create($value);
        if($request->row_col){
        $this->savePivot($id,$request->row_col,$request->seat_name);
        }
        return redirect()->route('bus.index')->with('message','Bus Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail=$this->bus->find($id);
        $destinations=$this->destination->get();
        $driver=Auth::user()->assistants()->where('category','driver')->get();
        $conductor=Auth::user()->assistants()->where('category','conductor')->get();
        $categories=$this->category->all();
        return view('admin.bus.edit',compact('detail','destinations','driver','categories','conductor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,['bus_number'=>'required','bus_category'=>'required','facilities'=>'required|regex:/[,]+/','image_1'=>'dimensions:max_width=2500,max_height=2000','image_2'=>'dimensions:max_width=2500,max_height=2000']);
        $value=$request->except('image','publish');
        $value['publish']=is_null($request->publish)? 0 : 1 ;
        if($request->image_1){
            $image=$this->imageProcessing($request->file('image_1'));
            $value['image_1']=$image;
        }
        if($request->image_2){
            $image=$this->imageProcessing($request->file('image_2'));
            $value['image_2']=$image;
        }
        if($request->image_3){

            $image=$this->imageProcessing($request->file('image_3'));
            $value['image_3']=$image;
        }
        $value['user_id']=Auth::user()->id;
        $driver=$this->bus->where('assistant_1',$request->assistant_1)->where('id','!=',$id)->first();
        $conductor=$this->bus->where('assistant_2',$request->assistant_2)->where('id','!=',$id)->first();
        if($driver){
            $driver['assistant_1']=null;
            $driver->save();
        }
        if($conductor){
            $conductor['assistant_2']=null;
            $conductor->save();
        }
        $this->bus->update($value,$id);
        
        return redirect()->route('bus.index')->with('message','Bus Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
    public function savePivot($busId,$row_col,$seat_name){
        for ($i = 0; $i < count($row_col); $i++) {
            $input = array('bus_id' => $busId, 'row_col' => $row_col[$i],'seat_name'=>$seat_name[$i]);
            $this->bus->savePivotTable($input);
        }
    }
    // public function updatePivotTable($instituteId,$row_col,$seat_name){
    //     $this->institute->deletePivotTable($instituteId);
    //     for ($i = 0; $i < count($row_col); $i++) {
    //         $input = array('institute_id' => $instituteId, 'row_col' => $row_col[$i],'seat_name'=>$seat_name[$i]);
    //         $this->bus->savePivotTable($input);
    //     }
    // }
    public function changeSeatName(Request $request){
        $this->bus->changeSeatName($request->id,$request->value);
        return "success";
    }
    public function busRequest(){
        $bus_request=Auth::user()->bus_request()->where('reject_status',0)->get();

        return view('admin.vendor.busRequest',compact('bus_request'));
    }
    public function rejectedBusList(){
        $bus_request=Auth::user()->bus_request()->where('reject_status',1)->get();
        return view('admin.vendor.rejectedBusList',compact('bus_request'));
    }

    public function bookingDetail($id){
        $year_en = date("Y",time());
        $month_en = date("m",time());
        $day_en = date("d",time());
        $date_ne = $this->calendar->get_nepali_date($year_en, $month_en, $day_en);
        $check_date=$date_ne['y'].'-'.((strlen($date_ne['m']) == 2) ? $date_ne['m'] : "0".$date_ne['m']).'-'.$date_ne['d'];
        $bookings=$this->booking->where('bus_id',$id)->where('date',$check_date)->orderBy('date','desc')->get();

        if($bookings){
            $booked = $bookings->count();
            // dd($booking);
        }else{
            $booked = 0;
        }   

        if($bus_seat = $this->bus->find($id)->busseat){
            $available = count($bus_seat)-$booked;
        }else{
            $available = 0;
        }

        return view('admin.bus.bookingDetail',compact('bookings','booked','available'));
    }
    public function bookingDetailByDate($id){
        $routine = $this->routine->findOrFail($id);
        $bookings = $this->booking->where('bus_id',$routine->bus_id)->where('date',$routine->date)->get();
        return view('admin.vendor.bookingDetailByDate',compact('bookings'));

    }
}
