<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Illuminate\Support\Facades\Hash;
use App\AdminModel\StudentModel;
use App\AdminModel\CourseModel;
use Illuminate\Support\Facades\Input;


class RegisterController extends Controller
{
	
    public function index(Request $request)
    {
        $course=CourseModel::all();   
        return view('register',compact('course'));
    }

    public function create(Request $request)
    {
       
       $messages = array(
           /* 'course_id.required'  => 'Please select course',*/
            'name.required'  => 'Please enter name',
            'mobile.required'  => 'Please enter mobile',
            'email.required'  => 'Please enter email',
            'password.required'  => 'Please enter password',
            'education.required'  => 'Please enter education',
            'address.required'  => 'Please enter address',
            'privacy_policy.required'  => 'Please fill checkbox',
        );
        $rules = array(
          /*  'course_id' => 'required',*/
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'password' => 'required',
            'education' => 'required',
            'address' => 'required',
            'privacy_policy' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( route('user_register') )
                        ->withErrors($validator)
                        ->withInput();
        }else
        {
          
          
          $email = $request->email;
       
          $existing = StudentModel::select('email')->where('email',$email)->pluck('email');
          if(count($existing)){

              return redirect()->back()->with('emessage', 'Email Already Exist.');  
           }else{
           StudentModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'education' => $request->education,
            'address' => $request->address,
            'gender' => $request->gender,
            'privacy_policy' => '1',
            'password' => Hash::make($request->password),
          ]);
            return redirect('/user_login')->with('message', 'Successfully registered.');  
        }
      }
    }


    

}
