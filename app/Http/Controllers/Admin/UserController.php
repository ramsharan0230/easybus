<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Auth;

class UserController extends Controller
{
    private $user;
    public function __construct(UserRepository $user){
        $this->user=$user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $details=$this->user->orderBy('created_at','desc')->where('role','admin')->where('main',0)->where('id','!=',$user->id)->get();
        return view('admin.user.list',compact('details'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'email'=>'unique:users|email',
            'password' => 'required|confirmed|min:6',
        ];
        $this->validate($request,$rules);
        $value=$request->except('confirm_password');
        $value['password']=bcrypt($request->password);
        $value['role']='admin';
        $value['publish']=1;
        $this->user->create($value);
        return redirect()->route('user.index')->with('message','User added successfully.');
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
        $detail=$this->user->find($id);
        return view('admin.user.edit',compact('detail'));
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
        return redirect()->route('user.index')->with('message','User updated successfully.');
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
        return redirect()->back()->with('message','User Deleted Successfully');
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
   
}
