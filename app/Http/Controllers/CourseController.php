<?php
namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use DB;
use App\AdminModel\CourseModel;
use App\AdminModel\ClassTypeModel;
use App\AdminModel\Payment;
class CourseController extends Controller
{
    public function index(Request $request)
    {
       //$course =  CourseModel::all(); 
       if(!empty(isset($request->gender)) && empty(isset($request->class_type)))
       {
            $course = DB::table('course')
             ->select('course.*')
             ->where('course.gender',$request->gender)
            ->get();
       }
       if(!empty(isset($request->class_type)) && empty(isset($request->gender)))
       {
            $course = DB::table('course')
             ->select('course.*')
             ->where('course.class_type',$request->class_type)
            ->get();
       }
       if(!empty(isset($request->class_type)) && !empty(isset($request->gender)))
       {
            $course = DB::table('course')
             ->select('course.*')
             ->where([
                 ['course.gender',$request->gender],
                 ['course.class_type',$request->class_type]
                 ])
            ->get();
       }
        if(!isset($request->class_type) && !isset($request->gender))
       {
        $course = DB::table('course')
             ->select('course.*')
            ->get();
       }
       $class_type=ClassTypeModel::all();
        return view('course',compact('course','class_type'));
    }

    public function details(Request $request,$id)
    {
		$course_details =  CourseModel::find($id); 
        $batch_details = DB::table('batch')
             ->select('batch.*')
            ->where('batch.course_id',$id)
            ->get();
             $class_details_data=array();
            foreach ($batch_details as $detail )
            {
                $class_details = DB::table('batch')
             ->select('batch.*')
            ->where('batch.open_time','>=',$detail->open_time)
            ->where('batch.close_time','<=',$detail->close_time)
            ->get();
           
            array_push($class_details_data,count($class_details));
             
            } //print_r($class_details_data); die;
        //     $class_details_data=array();
        //     foreach($batch_details as $detail)
        //     {
        //       // print_r($detail);die;
        //       $class_details =  DB::table('batch')
        //      ->select('*')
        //     ->where('open_time','>=',$detail->open_time)
        //     ->where('close_time','<=',$detail->close_time)
        //     ->get();
        //     array_push($class_details_data,$class_details);
        //     }
        //     foreach($class_details_data[0] as $class_count)
        //     {
        //         if($class_count->course_id == $id){
        //           echo"hi";
        //         }
                
        //     }
        //     die;
        //   print_r($class_details_data) ; die;
        // $class_details =  DB::table('payment')
        //      ->select('*')
        //     ->where('course_id',$id)
        //     ->get();
        //print_r(count($class_details));die;
        return view('course_details',compact('course_details','batch_details','class_details_data'));
    }

    public function classdetails(Request $request,$id)
        {
           echo"test"; die;
            print_r($id);die;
    		$course_details =  CourseModel::find($id); 
            $batch_details = DB::table('batch')
                 ->select('batch.*')
                ->where('batch.course_id',$id)
                ->get();
            
            return view('course_details',compact('course_details','batch_details'));
        }
}
