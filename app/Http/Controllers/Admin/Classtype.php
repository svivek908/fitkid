<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
use App\AdminModel\ClassTypeModel;

class Classtype extends Controller
{  
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  ClassTypeModel::all();
        return view('admin/classtype', compact('data'));
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
            'type.required'  => 'Please select type',
          );
        $rules = array(
            'type' => 'required',
          );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( route('classtype') )
                        ->withErrors($validator)
                        ->withInput();
        }else
        {
            
            ClassTypeModel::create([
            
               'type' => $request->type,
                
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
    public function edit(ClassTypeModel $ClassTypeModel, $id)
    {   
        $data =  ClassTypeModel::all();
        $mc = ClassTypeModel::find($id);
        return view('admin/classtype', compact('data','mc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassTypeModel $ClassTypeModel, $id)
    {
       $messages = array(
            'type.required'  => 'Please select type',
          );
        $rules = array(
            'type' => 'required',
          );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
         return redirect( url('admin/edit_classtype/'.$id) )
                        ->withErrors($validator)
                        ->withInput();
        }else
        { 
           

           
            unset($_POST['_token']);
            unset($_POST['id']);

           ClassTypeModel::where('id','=',$id)->update($_POST);
            
            return redirect( route('classtype') )->with('message', 'Updated successfully.');  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassTypeModel $ClassTypeModel, $id)
    {
        $reminder = ClassTypeModel::find($id);    
        $reminder->delete();
    }

}
