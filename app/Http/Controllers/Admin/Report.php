<?php

namespace App\Http\Controllers\Admin;
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

class Report extends Controller
{  
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$data = DB::table('payment')
            ->join('course', 'course.id', '=', 'payment.course_id')
            ->join('students', 'students.id', '=', 'payment.login_id')
            ->join('batch', 'batch.course_id', '=', 'course.id')
            ->join('attendence', 'attendence.student_id', '=', 'students.id')
            ->select('course.name as cname','students.*','batch.expiry_day','batch.start_date','batch.end_date','batch.status as batch_status',DB::raw('SUM(attendence.days) as total_abs'))
            ->get();*/
            $course =  CourseModel::all();
        $data = DB::select('select year(payment.created_at) as year, month(payment.created_at) as month, count(payment.course_id) as courses, sum(payment.price) as total_amount,(SELECT SUM(expenses.amount) FROM expenses WHERE month(expenses.created_at)=month(payment.created_at)) AS expenses from payment group by year(payment.created_at), month(payment.created_at)');
         return view('admin/report',['data'=>$data,'course'=>$course]);
        //return view('admin/report', compact('data'));
    }

    public function quaterly()
    {
        $course =  CourseModel::all();
        $data = DB::select('select year(payment.created_at) as year, month(payment.created_at) as month, count(payment.course_id) as courses, sum(payment.price) as total_amount,(SELECT SUM(expenses.amount) FROM expenses WHERE month(expenses.created_at)=month(payment.created_at)) AS expenses from payment group by year(payment.created_at), month(payment.created_at)');
         return view('admin/quaterly_report',['data'=>$data,'course'=>$course]);
     }
      public function classbase(Request $request,$id)
    {   
        $course =  CourseModel::all();
        $data = DB::select('SELECT  SUM(payment.price) as price , payment.course_id,course.name, COUNT(students.id) as student,COUNT(batch.expiry_day) as days FROM `payment`   LEFT JOIN course  ON payment.course_id=course.id LEFT JOIN batch ON batch.course_id =course.id LEFT JOIN students ON students.course_id =course.id WHERE payment.status="Completed"  GROUP BY payment.course_id');
         return view('admin/class_base_report',['data'=>$data,'course'=>$course]);
     }
      public function studentbase()
    {
         $course =  CourseModel::all();
        $data = DB::select('SELECT students.*,course.name as course,batch.open_time as time,batch.close_time as endtime FROM `students` LEFT JOIN course on students.course_id = course.id LEFT JOIN batch on students.course_id = batch.course_id');
        //print_r($data);die;
         return view('admin/student_base_report',['data'=>$data,'course'=>$course]);
     }

    
}
