<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use App\Repositories\Booking\BookingRepository;
use App\Repositories\Bus\BusRepository;
use App\Models\BusRequest;
use App\Models\BookingPaymentDetails;
use Auth;
use Image;

class VendorController extends Controller
{
    private $user;
    public function __construct(UserRepository $user,BookingRepository $booking,BusRepository $bus){
        $this->user=$user;
        $this->booking=$booking;
        $this->bus=$bus;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details=$this->user->orderBy('created_at','desc')->where('role','vendor')->where('publish',1)->get();
        return view('admin.vendor.list',compact('details'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=['pan.required'=>'pan number is required','passport_image.required'=>'personal image is required','citizen_back.required'=>'Back copy of citizenship is required','citizen_front.required'=>'Front copy of citizenship is required','citizen_front.dimensions'=>'Citizenship front should be less than 2500*2000','citizen_back.dimensions'=>'Citizenship back should be less than 2500*2000','company_image.dimensions'=>'Company registration image should be less than 2500*2000','pan_image.dimensions'=>'PAN image should be less than 2500*2000'];
            
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
        $value['publish']=1;
       

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
        return redirect()->route('vendor.index')->with('message','Vendor added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=$this->user->find($id);
        return view('admin.vendor.pendingVendorView',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail=$this->user->find($id);
        return view('admin.vendor.edit',compact('detail'));
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
        $old=$this->user->find($id);
        $sameEmailVal = $old->email == $request->email ? true : false;
        $this->validate($request, $this->rules($old->id,$sameEmailVal));
        $value=$request->except('confirm_password','password');

        if($request->password){
            $value['password']=bcrypt($request->password);
        }
        $this->user->update($value,$id);
        return redirect()->route('vendor.index')->with('message','Vendor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->destroy($id);
        return redirect()->back()->with('message','Vendor Deleted Successfully');
    }
    public function rules($oldId = null, $sameEmailVal=false){

        $rules =  [
            'email'=>'unique:users|email',
            
            
        ];
        if($sameEmailVal){
            $rules['email'] = 'unique:users,email,'.$oldId.'|max:255';
        }
        return $rules;
    }
    public function editVendorInfo(){
        return view('admin.vendor.updateInfo');
    }
    public function acceptRequest(Request $request){
        $data['acceptance_status']=1;
        $data['reject_status']=0;
        $busrequest=BusRequest::find($request->id)->update($data);
        return redirect()->back()->with('message','Request Accepted');
    }
    public function rejectRequest(Request $request){
        $data['acceptance_status']=0;
        $data['reject_status']=1;
        $busrequest=BusRequest::find($request->id)->update($data);
        return redirect()->back()->with('message','Request Accepted');
    }
    
    public function allCounters(){
        $allCounters=Auth::user()->vendors_counter()->where('acceptance_status',1)->distinct()->get(['sender_id']);
        
        $counters=[];
        foreach($allCounters as $counter){
            $counter=$this->user->find($counter->sender_id);
            array_push($counters, $counter);

        }
        
        return view('admin.vendor.allCounters',compact('counters'));
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
        if($request->passport_image){
            $documents=$request->file('passport_image');
            $filename=time().'pp'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['passport_image']=$filename;
            
        }
        if($request->citizen_front){
            $documents=$request->file('citizen_front');
            $filename=time().'cf'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['citizen_front']=$filename;
            
        }
        if($request->citizen_back){
            $documents=$request->file('citizen_back');
            $filename=time().'cb'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['citizen_back']=$filename;
            
        }
        // $value['user_id']=Auth::user()->id;
        $this->user->update($value,$id);
        
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
    public function addAssistant(){
        return view('admin.vendor.addAssistant');
    }
    public function saveAssistant(Request $request){
        $message=['citizen_front.dimensions'=>'Citizenship front should be less than 2500*2000'];
        $rules=[
            'email'=>'unique:users|email',
            'password' => 'required|confirmed|min:6',
            'passport_image'=>'required|dimensions:max_width=250,max_height=250',
            'citizen_front'=>'required|dimensions:max_width=2500,max_height=2500',
            'citizen_back'=>'required|dimensions:max_width=2500,max_height=2500',

        ];
        $this->validate($request,$rules);
        $value=$request->except('confirm_password','citizen_front','citizen_back','driving_front','driving_back','passport_image');
        $value['password']=bcrypt($request->password);
        $value['role']='assistant';
        $value['publish']=1;
        if($request->passport_image){
            $documents=$request->file('passport_image');
            $filename=time().'pp'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['passport_image']=$filename;
            
        }
        if($request->citizen_front){
            $documents=$request->file('citizen_front');
            $filename=time().'cf'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['citizen_front']=$filename;
            
        }
        if($request->citizen_back){
            $documents=$request->file('citizen_back');
            $filename=time().'cb'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['citizen_back']=$filename;
            
        }
        if($request->driving_front){
            $documents=$request->file('driving_front');
            $filename=time().'dfr'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['driving_front']=$filename;
            
        }
        if($request->driving_back){
            $documents=$request->file('driving_back');
            $filename=time().'db'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['driving_back']=$filename;
            
        }
        $value['parent_id']=Auth::user()->id;
        
        $this->user->create($value);
        return redirect()->route('allAssistant')->with('message','Assistant added successfully.');
    }
    public function allAssistant(){
        $assistants=Auth::user()->assistants;

        return view('admin.vendor.allAssistant',compact('assistants'));
    }
    public function editAssistant($id){
        $data=$this->user->find($id);
        return view('admin.vendor.editAssistant',compact('data'));
    }
    public function updateAssistant(Request $request,$id){
        $value=$request->except('confirm_password','citizen_front','citizen_back','driving_front','driving_back','passport_image');
        if($request->password){
            $value['password']=bcrypt($request->password);
        }
        
        $value['role']='assistant';
        $value['publish']=1;
        if($request->passport_image){
            $documents=$request->file('passport_image');
            $filename=time().'pp'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['passport_image']=$filename;
            
        }
        if($request->citizen_front){
            $documents=$request->file('citizen_front');
            $filename=time().'cf'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['citizen_front']=$filename;
            
        }
        if($request->citizen_back){
            $documents=$request->file('citizen_back');
            $filename=time().'cb'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['citizen_back']=$filename;
            
        }
        if($request->driving_front){
            $documents=$request->file('driving_front');
            $filename=time().'dfr'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['driving_front']=$filename;
            
        }
        if($request->driving_back){
            $documents=$request->file('driving_back');
            $filename=time().'db'.$documents->getClientOriginalName();
            $documents->move(public_path('document'),$filename);   
            $value['driving_back']=$filename;
            
        }
        if($request->password){
            $value['password']=bcrypt($request->password);
        }
        $value['parent_id']=Auth::user()->id;
        
        $this->user->update($value,$id);
        return redirect()->route('allAssistant')->with('message','Assistant updated successfully.');
    }
    public function assistantDetail($id){
        $data=$this->user->findOrFail($id);
        return view('admin.vendor.assistantDetail',compact('data'));

    }
    public function editPersonalInfo(){
        
        return view('admin.vendor.updatePersonalInfo');
    }
    public function pendingVendor(){
        $users=$this->user->where('role','vendor')->where('publish',0)->orderBy('created_at','desc')->get();
        return view('admin.vendor.pendingVendor',compact('users'));
    }
    public function pendingCounter(){
        $users=$this->user->where('role','counter')->where('publish',0)->orderBy('created_at','desc')->get();
        return view('admin.vendor.pendingCounter',compact('users'));
    }
    public function approveVendorRequest(Request $request){
        $user=$this->user->findOrFail($request->id);
        $user['publish']=1;

        $user->update();
        
        return redirect()->back();
    }
    public function rejectVendorRequest(Request $request){
        $user=$this->user->findOrFail($request->id);
        $user['publish']=0;
        $user->update();
        return redirect()->back();
    }
    
    public function requestSenderView($id){
        $data= $this->user->findOrFail($id);

        return view('admin.vendor.requestSenderView',compact('data'));
    }
    public function ticketSale($id){
        $bookingDetails=BookingPaymentDetails::where('counter_id',$id)->orderBy('date','desc')->paginate(500);
        return view('admin.vendor.ticketSale',compact('bookingDetails'));
    }
    public function approvedBus($id){
        $bus_request=BusRequest::where('sender_id',$id)->get();
        return view('admin.vendor.approvedBusForCounter',compact('bus_request'));
    }
    public function approvedBusLayout($id){
        $bus=$this->bus->findOrFail($id);
        return view('admin.vendor.busLayout',compact('bus'));
    }
}
