<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
use App\AdminModel\CourseModel;
use App\AdminModel\ClassTypeModel;
class Course extends Controller
{  
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  CourseModel::all();
        $ct=ClassTypeModel::all();
        return view('admin/course', compact('data','ct'));
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
            'name.required'  => 'Please enter name',
            'fees.required'  => 'Please enter class fee',
            'description.required'  => 'Please enter description',
            'age_from.required'  => 'Please enter minimum age price',
            'age_to.required'  => 'Please enter maximum age',
            'class_size.required'  => 'Please enter class size',
            'image.required'  => 'Please select file',
           // 'document.required'  => 'Please select document file',
           
        );
        $rules = array(
            'name' => 'required',
            'fees' => 'required',
            'description' => 'required',
            'age_from' => 'required',
            'age_to' => 'required',
            'image' => 'required',
            //'document' => 'required',
            
            'class_size' => 'required',
           
        );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( route('course') )
                        ->withErrors($validator)
                        ->withInput();
        }else
        {
            $fileName = null;
            if (request()->hasFile('image')) {
                $file = request()->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./public/admin-assets/course/', $fileName);    
            }
            $documentfileName = null;
            if (request()->hasFile('document')) {
                $file = request()->file('document');
                $documentfileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./public/admin-assets/course/document/', $documentfileName);    
            }
             

            CourseModel::create([
               'name' => request()->get('name'),
               'fees' => request()->get('fees'),
               'description' => request()->get('description'),
               'age_from' => request()->get('age_from'),
               'age_to' => request()->get('age_to'),
               'class_size' => request()->get('class_size'),
               'gender' => request()->get('gender'),
               'class_type' => request()->get('class_type'),
               'image' => $fileName,
               'document' => $documentfileName,
                
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
    public function edit(CourseModel $CourseModel, $id)
    {   
        $data =  CourseModel::all();
        $mc = CourseModel::find($id);
         $ct=ClassTypeModel::all();
        return view('admin/course', compact('data','mc','ct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseModel $CourseModel, $id)
    {
         $messages = array(
            'name.required'  => 'Please enter name',
            'fees.required'  => 'Please enter class fee',
            'description.required'  => 'Please enter description',
            'age_from.required'  => 'Please enter minimum age price',
            'age_to.required'  => 'Please enter maximum age',
            'class_size.required'  => 'Please enter class size',
            /*'image.required'  => 'Please select file',
            'document.required'  => 'Please select document file',
           */
        );
        $rules = array(
            'name' => 'required',
            'fees' => 'required',
            'description' => 'required',
            'age_from' => 'required',
            'age_to' => 'required',
            /*'image' => 'required',
            'document' => 'required',
            */
            'class_size' => 'required',
           
        );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( url('admin/edit_course/'.$id) )
                        ->withErrors($validator)
                        ->withInput();
        }else
        { 
             $fileName = null;
            if (request()->hasFile('image')) {
                $file = request()->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./public/admin-assets/course/', $fileName);
                $_POST['image'] = $fileName;    
            }
            $documentfileName = null;
            if (request()->hasFile('document')) {
                $file = request()->file('document');
                $documentfileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./public/admin-assets/course/document/', $documentfileName);
                $_POST['document'] = $documentfileName;    
            }

           
            unset($_POST['_token']);
            unset($_POST['id']);

           CourseModel::where('id','=',$id)->update($_POST);
            
            return redirect( route('course') )->with('message', 'Updated successfully.');  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseModel $CourseModel, $id)
    {
        $reminder = CourseModel::find($id);    
        $reminder->delete();
    }

}
