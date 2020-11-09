<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use App\AdminModel\ProfileModel;

class Profile extends Controller
{  
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileModel $ProfileModel)
    {   
        $id= Auth::User()->id;
        $c = ProfileModel::find($id);
        return view('admin/edit_profile', compact('c'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileModel $ProfileModel, $id)
    {
        $messages = array(
            'name.required'  => 'Please enter your name',
            'email.required'  => 'Please enter your email',
            );
        $rules = array(
            'name' => 'required',
            'email' => 'required',
           );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( route('copyright') )
                        ->withErrors($validator)
                        ->withInput();
        }else
        { 
            $fileName = null;
            if (request()->hasFile('image')) {
                $file = request()->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./admin-assets/assets/img/users/', $fileName);    
            }
            $input = Input::all();
            $input['image']=$fileName;
            unset($input['_token']);
            ProfileModel::where('id', $id)->update($input);   
             return redirect( route('edit_profile') )->with('message', 'Updated successfully.'); 
        }
    }


}
