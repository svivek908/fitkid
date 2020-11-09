<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
use App\AdminModel\VideoModel;

class Video extends Controller
{  
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  VideoModel::all();
        return view('admin/video', compact('data'));
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
            'link.required'  => 'Please select link',
          );
        $rules = array(
            'link' => 'required',
          );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( route('video') )
                        ->withErrors($validator)
                        ->withInput();
        }else
        {
            
            VideoModel::create([
            
               'link' => $request->link,
                
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
    public function edit(VideoModel $VideoModel, $id)
    {   
        $data =  VideoModel::all();
        $mc = VideoModel::find($id);
        return view('admin/video', compact('data','mc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoModel $VideoModel, $id)
    {
       $messages = array(
            'link.required'  => 'Please select link',
          );
        $rules = array(
            'link' => 'required',
          );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
         return redirect( url('admin/edit_video/'.$id) )
                        ->withErrors($validator)
                        ->withInput();
        }else
        { 
           

           
            unset($_POST['_token']);
            unset($_POST['id']);

           VideoModel::where('id','=',$id)->update($_POST);
            
            return redirect( route('video') )->with('message', 'Updated successfully.');  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoModel $VideoModel, $id)
    {
        $reminder = VideoModel::find($id);    
        $reminder->delete();
    }

}
