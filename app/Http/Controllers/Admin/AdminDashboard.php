<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use App\AdminModel\ProfileModel;
use App\AdminModel\CourseModel;
use App\AdminModel\StudentModel;

class AdminDashboard extends Controller
{  
    public function index()
    {
      $data =StudentModel::orderBy('id', 'desc')->take(5)->get();
		
  		$count_students =DB::table('students')->count();
  		$count_courses =DB::table('course')->count();
  		$count_batch =DB::table('batch')->where('status','not_expire')->count();;
		
        return view('admin/dashboard', compact('data','count_students','count_courses','count_batch'));
       // return view('admin/dashboard');
    }


}
