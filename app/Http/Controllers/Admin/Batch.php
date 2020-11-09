<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
use App\AdminModel\BatchModel;
use App\AdminModel\ClassModel;
use App\AdminModel\CourseModel;
use App\AdminModel\StudentModel;
use App\AdminModel\AttendenceModel;

class Batch extends Controller
{  
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('batch')
            ->join('course', 'course.id', '=', 'batch.course_id')
            ->select('batch.*', 'course.name as cname')
            ->get();
           // print_r($data);die;
        $course =  CourseModel::all();
        return view('admin/batch', compact('data','course'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request,$id)
    {
       $data = DB::table('class')
        ->join('course', 'course.id', '=', 'class.course_id')
        ->join('students', 'students.id', '=', 'class.student_id')
        ->select('students.*', 'course.name as cname')
        ->where('class.id', $id)
        ->get();
        $course =  CourseModel::all();
        return view('admin/view-batch', compact('data','course'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attend_batch(Request $request,$id)
    {
        
       $data = DB::table('attendence')
        ->rightjoin('students', 'students.id', '=', 'attendence.student_id')
        ->rightjoin('batch', 'batch.id', '=', 'attendence.batch_id')
        ->select('students.name as sname','attendence.*','batch.start_date','batch.end_date')
        ->where('batch.id', $id)
        ->groupBy('attendence.student_id')
        ->get();
       // print_r($data);die;
        $abc=array();
        foreach ($data as $key => $value) {
        $get_details=DB::table('attendence')
        ->join('batch', 'batch.id', '=', 'attendence.batch_id')
        ->select('attendence.*','batch.start_date','batch.end_date')
        ->where('attendence.student_id', $value->student_id)
        ->get();
        array_push($abc, $get_details);
        }
        if($data[0]->start_date > date('Y-m-d'))
        {
            $start = 0;
            $start_date= $data[0]->start_date;
        }
        else
        {
            $start = 1;
            $start_date= $data[0]->start_date;
        }
        if($data[0]->end_date > date('Y-m-d'))
        {
            $end_date = date('Y-m-d');
        }
        else
        {
            $end_date=$data[0]->end_date;
        }
        $student =  StudentModel::all();
        return view('admin/attendence-batch', compact('data','student','start','end_date','start_date','abc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_leave(Request $request)
    {

        $messages = array(
            'student_id.required'  => 'Please select student',
            'date_from.required'  => 'Please enter start date',
            'date_to.required'  => 'Please enter to date',
            'reason.required'  => 'Please enter reason',
          );
        $rules = array(
            'student_id' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'reason' => 'required'
        );


        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( url('admin/attend_batch/'.$request->batch_id) )
                        ->withErrors($validator)
                        ->withInput();
        }else
        {
           
             
            $start_date=date('Y-m-d',strtotime(request()->get('date_from')));
            $end_date=date('Y-m-d',strtotime(request()->get('date_to')));
            $datediff = strtotime($end_date) - strtotime($start_date);
            $exp_days= $datediff / (60 * 60 * 24);
            if($exp_days !=0)
            { 
            $exp_day= $exp_days;
            }
            else
            {
            $exp_day= 1;
            }

            AttendenceModel::create([
               'student_id' => request()->get('student_id'),
               'batch_id' => request()->get('batch_id'),
               'date_from' => $start_date,
               'date_to' => $end_date,
               'days' => $exp_day,
               'reason' =>  request()->get('reason'),
                
            ]);
            return redirect()->back()->with('message', 'Added successfully.');  
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = array(
            'course_id.required'  => 'Please select course',
            'open_time.required'  => 'Please enter open time',
            'close_time.required'  => 'Please enter close time',
            'class_size.required'  => 'Please enter class strength',
          );
        $rules = array(
            'course_id' => 'required',
            'open_time' => 'required',
            'close_time' => 'required',
            'class_size' => 'required'
        );


        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( route('batch') )
                        ->withErrors($validator)
                        ->withInput();
        }else
        {
           
             
            $start_date=date('Y-m-d',strtotime(request()->get('start_date')));
            $end_date=date('Y-m-d',strtotime(request()->get('end_date')));
            $datediff = strtotime($end_date) - strtotime($start_date);
            //print_r($datediff);die;
            $exp_day= round($datediff / (60 * 60 * 24));
            
            $days = NULL;
            if(request()->get('days')){
                $days = implode(',',request()->get('days'));
            }
            
            BatchModel::create([
               'course_id' => request()->get('course_id'),
               'open_time' => request()->get('open_time'),
               'close_time' => request()->get('close_time'),
               'start_date' => $start_date,
               'end_date' => $end_date,
               'expiry_day' => $exp_day,
               'days' => $days,
               'class_size' => request()->get('class_size'),
            ]);
            return redirect()->back()->with('message', 'Added successfully.');  
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function edit(BatchModel $BatchModel, $id)
    {   
         $data = DB::table('batch')
            ->join('course', 'course.id', '=', 'batch.course_id')
            ->select('batch.*', 'course.name as cname')
            ->get();
        $mc = BatchModel::find($id);
        $course = CourseModel::all();
        //echo"<pre>";
      //  print_r($mc);
        //print_r($course);
       // die;
       
        return view('admin/batch', compact('data','course','mc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BatchModel $BatchModel, $id)
    {
      
        $messages = array(
            'course_id.required'  => 'Please select course',
            'open_time.required'  => 'Please enter open time',
            'close_time.required'  => 'Please enter close time',
            'class_size.required'  => 'Please enter class strength',
          );
        $rules = array(
            'course_id' => 'required',
            'open_time' => 'required',
            'close_time' => 'required',
            'class_size' => 'required'
        );
        
        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( url('admin/edit_batch/'.$id) )
                        ->withErrors($validator)
                        ->withInput();
        }else
        { 
        
           
            unset($_POST['_token']);
            unset($_POST['id']);
            
            if(isset($_POST['days']) && ($_POST['days'])){
                $_POST['days'] = implode(',',$_POST['days']);
            }
            
            
           BatchModel::where('id','=',$id)->update($_POST);
            
            return redirect( route('batch') )->with('message', 'Updated successfully.');  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BatchModel $BatchModel, $id)
    {
        $reminder = BatchModel::find($id);    
        $reminder->delete();
        return redirect()->back();
    }
    

}
