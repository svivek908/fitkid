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

class PaymentController extends Controller
{  
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  Payment::orderBy('id','DESC')->get();
        return view('admin/payments', compact('data'));
    }

}
