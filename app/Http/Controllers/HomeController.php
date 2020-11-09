<?php
namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Input;
use App\AdminModel\BannerModel;
use App\AdminModel\GalleryModel;
use App\AdminModel\VideoModel;
use App\AdminModel\CourseModel;
use App\AdminModel\ContactModel;
use App\AdminModel\TestiModel;
class HomeController extends Controller
{
    public function index(Request $request)
    { 
        $banners=$gallery=$video=$course=$testi=[];
        $student=$batches=$courses=0;
        
        $banners =  BannerModel::all();
        //$gallery =  DB::table('gallery')->orderBy('id','DESC')->limit(3)->get();
        //$video =  DB::table('video')->orderBy('id','DESC')->limit(3)->get();
        //$course =  CourseModel::all();

        //$student=DB::table('students')->count();
        //$batches=DB::table('batch')->count();
        //$courses=DB::table('course')->count();
        //$testi=TestiModel::all();
        return view('index',compact('banners','gallery','course','student','batches','courses','testi','video'));
    }

    public function about(Request $request)
    {
		 
        return view('about');
    }
    public function gallery(Request $request)
    {
		$gallery =  GalleryModel::all();
		$video =  VideoModel::all();
        return view('gallery',compact('gallery','video'));
    }

    public function faq(Request $request)
    {
		 
        return view('faq');
    }

    public function privacy_policy(Request $request)
    {
		 
        return view('privacy_policy');
    }
    public function terms(Request $request)
    {
		 
        return view('terms');
    }

    public function contact(Request $request)
    {
		 
        return view('contact');
    }
    public function add_contact(Request $request)
    {
         
        $messages = array(
           /* 'course_id.required'  => 'Please select course',*/
            'name.required'  => 'Please enter name',
            'mobile.required'  => 'Please enter mobile',
            'email.required'  => 'Please enter email',
            'subject.required'  => 'Please enter subject',
            'message.required'  => 'Please enter message'
        );
        $rules = array(
          /*  'course_id' => 'required',*/
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( route('contact') )
                        ->withErrors($validator)
                        ->withInput();
        }else
        {
          
          
          $email = $request->email;
       
           ContactModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'subject' => $request->subject,
            'message' => $request->message
           
          ]);
            return redirect('/contact')->with('message', 'Thank you for contacting us! We will get back to you soon.');  
       
      }
    }
    
    static public function get_user()
    {
      $user=Auth::guard('customer')->User();
      if(!$user)
      {
        $user=array();
      }
      return $user;
    }



}
