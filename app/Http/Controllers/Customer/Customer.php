<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Hash;
use Cookie;
use App\AdminModel\StudentModel;
use App\AdminModel\CourseModel;
use App\AdminModel\BatchModel;
use App\AdminModel\ClassModel;
use App\AdminModel\Payment;
use App\Http\Controllers\Customer\PaymentController;

class Customer extends Controller
{  
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $id =Auth::guard('customer')->user()->id;
       $users = DB::table('students')
            ->leftJoin('course', 'course.id', '=', 'students.course_id')
            ->leftJoin('batch', 'batch.course_id', '=', 'students.course_id')
            ->select('students.*', 'course.*','students.id as sid','students.name as sname','students.status as sstatus','batch.*')
            ->where('students.id', $id)
            ->get();
    
    	return view('profile',compact('users'));
	   }     
    public function profile_course(Request $request)
    {
      $id =Auth::guard('customer')->user()->id;
       $course_details = DB::table('students')
           ->Join('course', 'course.id', '=','students.course_id' )
           ->Join('batch', 'batch.login_id', '=','students.id' )
           ->join('payment','course.id','=','payment.course_id')
           ->select('course.*','batch.*','payment.*')
            ->where('payment.login_id', $id)
            ->where('payment.status', 'Completed')
            ->get();
           // print_r($course_details);die;
     return view('my_courses',compact('course_details'));
     } 
     
    public function edit(Request $request)
    {
        $id =Auth::guard('customer')->user()->id;
        $users = StudentModel::find($id);
          return view('edit_profile',compact('users'));
    }

   public function update(Request $request)
    {
       $messages = array(
            'name.required'  => 'Please enter your name',
            
            'mobile.required'  => 'Please enter your contact number',
            'address.required'  => 'Please enter your address',
            'gender.required'  => 'Please select your gender',
            'education.required'  => 'Please enter your education',
            
        );
        $rules = array(
            'name' => 'required',
           
            'mobile' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'education' => 'required',
           
        );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else
        { 
        
           $id =Auth::guard('customer')->user()->id;
            unset($_POST['_token']);
            unset($_POST['id']);
             if(StudentModel::where('id','=',$id)->update($_POST)){
            
              return redirect()->back()->with('message', 'Updated successfully.');
            }else{
                return redirect()->back()->with('emessage','something went wrong');
            }

        }
    }
  
    public function changepassword(Request $request)
    {
        return view('change_password');
    } 
   public function update_password(Request $request)
    {
       $messages = array(
            'cpassword.required'  => 'Please enter current password',
            'password.required'  => 'Please enter your new password',            
            'npassword.required'  => 'Please reenter your new password',            
        );
        $rules = array(
            'cpassword' => 'required',
            'password' => 'required',
            'npassword' => 'required',
            );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else
        { 
        
           $id =Auth::guard('customer')->user()->id;

            if(Auth::guard('customer')->Check())
                  {
                    if($_REQUEST['password'] != $_REQUEST['npassword'])
                    {
                         return redirect()->back()->with('emessage',"Confirm Password Not Matched"); 
                    }
                    $cpass= Auth::guard('customer')->User()->password;
                    if(Hash::check($_REQUEST['cpassword'],$cpass)){
                       $id= Auth::guard('customer')->User()->id;
                       $save= StudentModel::find($id);
                       $save->password= Hash::make($_REQUEST['npassword']);
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

    public function course_details(Request $request)
    {
    
       $course_details = DB::table('batch')
             ->select('batch.*')
            ->where('batch.course_id',$request->c_id)
            ->get();
       
       
            return response()->json([
                'result' => true,
                'data' => $course_details, 
                'course_id' => $request->c_id 
            ]);
    }
   
   public function add_batch(Request $request)
    {
      $id =Auth::guard('customer')->user()->id;
      $days=BatchModel::find($request->batch_id);
       $add= ClassModel::create([
            'student_id' => $id,
            'course_id' => $request->course_id,
            'batch_id' => $request->batch_id,
            'start_from' => date('Y-m-d'),
            'expiry_days' => $days->expiry_day
         ]);
      if($add){ 
      return response()->json(['result' => true]);
      }
      else
      {
      return response()->json(['result' => false]);
     }
    }
   public function buy_detail(Request $request)
    {
      $id =Auth::guard('customer')->user()->id;
      
      if(!$id){
               return response()->json(['result' => false,'message'=>"Please login first"]);
      }
      
       $add= Payment::create([
            'login_id' => $id,
            'course_id' => $request->c_id,
            'price' => $request->price,
            'batch_id' => $request->batch_id
         ]);
      if($add){

        $payment = PaymentController::payment_processing($add->price,$add->id);
        if($payment->status == 'success' ){
            // DB::table('students')
            // ->where('id', $id)
            // ->update(['course_id' => $request->c_id]);
          $payment->result = true;
          return response()->json($payment);
            
        }else{
          
         return response()->json(['result' => false,'message'=>$payment->message]);
        } 
      }
      else
      {
      return response()->json(['result' => false,'message'=>"Something went wrong"]);
     }
    } 


    
    
}
