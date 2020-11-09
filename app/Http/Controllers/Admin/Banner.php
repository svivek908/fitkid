<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
use App\AdminModel\BannerModel;

class Banner extends Controller
{  
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  BannerModel::all();
        return view('admin/banner', compact('data'));
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
            'title.required'  => 'Please enter title',
            'image.required'  => 'Please select image'
           
           
        );
        $rules = array(
            'title' => 'required',
            'image' => 'required'
         
        );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( route('banner') )
                        ->withErrors($validator)
                        ->withInput();
        }else
        {
            $fileName = null;
            if (request()->hasFile('image')) {
                $file = request()->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./admin-assets/Banner/', $fileName);    
            }
             

            BannerModel::create([
               'title' => request()->get('title'),
               'image' => $fileName,
                
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
    public function edit(BannerModel $BannerModel, $id)
    {   
        $data =  BannerModel::all();
        $mc = BannerModel::find($id);
        return view('admin/banner', compact('data','mc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BannerModel $BannerModel, $id)
    {
         $messages = array(
            'title.required'  => 'Please enter title',
           
           
        );
        $rules = array(
            'title' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
           return redirect( url('admin/edit_banner/'.$id) )
                        ->withErrors($validator)
                        ->withInput();
        }else
        { 
             $fileName = null;
            if (request()->hasFile('image')) {
                $file = request()->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./admin-assets/Banner/', $fileName);
                $_POST['image'] = $fileName;    
            }

           
            unset($_POST['_token']);
            unset($_POST['id']);

           BannerModel::where('id','=',$id)->update($_POST);
            
            return redirect( route('banner') )->with('message', 'Updated successfully.');  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BannerModel $BannerModel, $id)
    {
        $reminder = BannerModel::find($id);    
        $reminder->delete();
    }

}
