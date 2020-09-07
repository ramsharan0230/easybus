<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use App\User;
use Auth;
use Session;

class LoginController extends Controller
{
    public function __construct(UserRepository $user){
        $this->user=$user;
    }
    public function login(){
    	return view('admin.login');
    }
    public function postLogin(Request $request){
    	$this->validate($request, [
            'email'    => 'required',
            'password' => 'required',
        ]);
    	$result=User::where('email',$request->email)->first();
        if($result){
            if(!\Hash::check($request->password, $result->password)){
                return back()->with('message','Invalid Username\Password');
            }elseif($result->role!='admin' && $result->publish==0){
                return back()->with('message',"Your account is inactive!<br> Please contact  Team.");
            }else{
                if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
                           return redirect()->route('dashboard.index');
                       } else {
                           return back()->withInput()->withErrors(['email'=>'something is wrong!']);
                       }
            }
        }
        return back()->with('message','Invalid Username\Password');
    }
    public function Logout(){
    	Auth::logout();
    	Session::flush();
    	return redirect()->route('login');
    }
    public function registerView(){
        return view('admin.register');
    }
    public function register(Request $request){
        $rules=[
            'email'=>'unique:users|email',
            'password' => 'required|confirmed|min:6',
        ];
        $this->validate($request,$rules);
        $value=$request->except('confirm_password');
        $value['password']=bcrypt($request->password);
        $value['role']='counter';
        $this->user->create($value);
        return redirect()->back()->with('message','User added successfully.');
    }
}
