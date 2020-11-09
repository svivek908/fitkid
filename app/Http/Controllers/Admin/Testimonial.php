<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
use App\AdminModel\TestiModel;

class Testimonial extends Controller
{  
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TestiModel::all();
        return view('admin/testi', compact('data'));
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
            'designation.required'  => 'Please enter designation',
            'description.required'  => 'Please enter description'
         );
        $rules = array(
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required'
           );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( route('testimonial') )
                        ->withErrors($validator)
                        ->withInput();
        }else
        {
           
             

            TestiModel::create([
               'name' => request()->get('name'),
               'designation' => request()->get('designation'),
               'description' => request()->get('description'),
                
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
    public function edit(Request $request,TestiModel $TestiModel, $id)
    {   
        $mc = TestiModel::find($id);
        $data = TestiModel::all();
        return view('admin/testi', compact('data','mc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestiModel $TestiModel, $id)
    {
         $messages = array(
            'name.required'  => 'Please enter name',
            'designation.required'  => 'Please enter designation',
            'description.required'  => 'Please enter description'
         );
        $rules = array(
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required'
           );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( url('admin/edit_testimonial/'.$id) )
                        ->withErrors($validator)
                        ->withInput();
        }else
        { 
        
           
            unset($_POST['_token']);
            unset($_POST['id']);

           TestiModel::where('id','=',$id)->update($_POST);
            
            return redirect( route('testimonial') )->with('message', 'Updated successfully.');  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestiModel $TestiModel, $id)
    {
        $reminder = TestiModel::find($id);    
        $reminder->delete();
    }

}
