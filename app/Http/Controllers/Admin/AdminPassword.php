<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\AdminModel\AdminModel;

class AdminPassword extends Controller
{  
    public function index()
    {
      
        //return view('admin/dashboard');
    }
	
	 public function update(Request $request, AdminModel $AdminModel, $id)
    {
       $messages = array(
            'current_password.required'  => 'Enter current password',
            'new_password.required'  => 'Enter new password',
            'confirm_password.required'  => 'Enter confirm password',
        );
        $rules = array(
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( route( 'admin_change_password',$_REQUEST['id'] ) )
                        ->withErrors($validator)
                        ->withInput();
        }else
        { 
            $id = $_POST['id'];

			if(Auth::Check())
                  {
                    $cpass= Auth::User()->password;
                    if(Hash::check($_REQUEST['current_password'],$cpass)){
                       $id= Auth::User()->id;
                       $save= AdminModel::find($id);
                       $save->password= Hash::make($_REQUEST['confirm_password']);
                       $save->save();
                       return redirect()->back()->with('message',"Password Updated Successfull"); 
                    }else{
                       return redirect()->back()->with('emessage',"Current Password Not Matched"); 
                     }
                  }
                   else
                      {
                         return redirect()->back()->with('emessage','something went wrong');
                      } 
        }
    }

	
    
    public function logout(){
      return view('admin/logoutpage');
    }

}
