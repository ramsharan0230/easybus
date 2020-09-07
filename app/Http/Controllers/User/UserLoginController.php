<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Client;
use Session;
use Mail;

class UserLoginController extends Controller
{

    use AuthenticatesUsers;
    public function __construct()
       {
           $this->middleware('guest:admin', ['except' => ['logout']]);
       }
    public function login(Request $request)
    {
        
        $result=Client::where('email',$request->email)->first();
        if($result){
            if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended(route('account'));

        }
        }
        return redirect()->route('home')->with('loginmessage','Something went wrong');
    }
    public function register(Request $request){
        // dd($request->all());
        $this->validate($request,['name'=>'required','mobile_number'=>'required','email'=>'required|unique:clients|email','password'=>'required|confirmed|min:6']);
        $data=$request->except('password');
        $data['password']=bcrypt($request->password);
        $data['publish']=1;
       
        Client::create($data);
        return redirect()->back()->with('message1','Account Register Successfully');
    }
    // public function account(){
    //  return view('front.account');
    // }
    public function logout(){
        Auth::guard('admin')->logout();
            return redirect()->route('home');
    }

   
}
