<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
use App\AdminModel\StudentModel;
use App\AdminModel\CourseModel;
use App\AdminModel\Payment;

class Students extends Controller
{  
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  StudentModel::all();
        return view('admin/students', compact('data'));
    }

    public function view(Request $request , $id)
    {
        $data =  StudentModel::find($id);
        $course = Payment::join('course','payment.course_id','=','course.id')->select('payment.*','course.name')->where('payment.login_id',$id)->where('payment.status','Completed')->get();
        $shipping_address=array();
        return view('admin/student_details', compact('data','shipping_address','course'));
    }

    public function update_status(Request $request, StudentModel $StudentModel)
    {
        
            
            $input = ['status' => $request->c_id];
            unset($input['_token']);
            $ca=StudentModel::where('id', $request->m_id)->update($input);
            if($ca){   
            return response()->json([
                'result' => true
            ]);
            }
            else
            {
                 return response()->json([
                'result' => false
            ]);
            }
    }
    public function destroy(StudentModel $StudentModel, $id)
    {
        $reminder = StudentModel::find($id);    
        $reminder->delete();
        return redirect()->back();
    }

}
