<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Hash;
use Cookie;
use App\AdminModel\StudentModel;
class LoginController extends Controller
{
    public function index(Request $request)
    {
          return view('login');
		
    }
	
	public function login(Request $request)
	{
	      $messages = array(
            'email.required'  => 'Please enter email',
            'password.required'  => 'Please enter password',
             );
        $rules = array(
            'email' => 'required',
            'password' => 'required',
            );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( route('user_login') )
                        ->withErrors($validator)
                        ->withInput();
        }else
        {
            $email=$request->email;
            $password=$request->password;
            $remember=$request->remember;
            if($remember==1){
                $remember=true;
            }else{
                $remember=false;
            } 
			/*$customer=StudentModel::select('*')->where('email',$email)->get();
            if(count($customer)){ 
            if($customer[0]->status != 'approved')
            {
                 return redirect('user_login')->withInput()->with('emessage', 'Your account is '.$customer[0]['status'].' by admin!');  
            }
            }*/
          if(Auth::guard('customer')->attempt(['email' => $email, 'password' => $password],$remember)) 
            {
                $user = Auth::guard('customer')->user();
                
              if($user->status == 'Pending'){
                  
                return redirect('user_login')->withInput()->with('emessage', 'Your account is under review');
                Auth::guard('customer')->logout();
              }elseif($user->status == 'Disabled'){
                return redirect('user_login')->withInput()->with('emessage', 'Your account is disabled by admin');
                Auth::guard('customer')->logout();
                  
              }    
                
              $ids=Auth::guard('customer')->user()->id;
             
                   return redirect()->route('profile_manage');
             }
            else
            {
                return redirect('user_login')->withInput()->with('emessage', 'Username or Password is wrong !');  
            }
            
        }
	}

    public function forgot_password(Request $request)
    {
        return view('forgot_password');
    }

}
