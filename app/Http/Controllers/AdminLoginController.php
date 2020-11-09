<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Hash;
use Cookie;
class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        //$password = Hash::make(123456); die();
       $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            return redirect('/admin')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $email=$request->email;
            $password=$request->password;
            $remember=$request->remember;
            if($remember==1){
                $remember=true;
            }else{
                $remember=false;
            } 
            $auth = new Auth;
             //var_dump($auth); 
            if (Auth::attempt(['email' => $email, 'password' => $password],$remember)) 
            {
                if($request->remember == 1){ 
               Cookie::queue('admin_email', $email, 60);
               Cookie::queue('admin_password', $password, 60);
               Cookie::queue('admin_remember', $remember, 60);
                }
                else
                {
                   Cookie::queue(\Cookie::forget('admin_email'));
                   Cookie::queue(\Cookie::forget('admin_password'));
                   Cookie::queue(\Cookie::forget('admin_remember'));
                  
                }
               return redirect()->route('dashboard');
            }
            else
            {
                return redirect()->back()->withInput()->with('emessage', 'Username or Password is wrong !');  
            }
            
        }
    }

}
