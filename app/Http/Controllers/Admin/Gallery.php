<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
use App\AdminModel\GalleryModel;

class Gallery extends Controller
{  
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  GalleryModel::all();
        return view('admin/gallery', compact('data'));
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
            'image.required'  => 'Please select image',
          );
        $rules = array(
            'image' => 'required',
          );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( route('gallery') )
                        ->withErrors($validator)
                        ->withInput();
        }else
        {
            $fileName = null;
            if (request()->hasFile('image')) {
                $file = request()->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./admin-assets/gallery/', $fileName);    
            }
            //dd($fileName); 

            GalleryModel::create([
            
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
    public function edit(GalleryModel $GalleryModel, $id)
    {   
        $data =  GalleryModel::all();
        $mc = GalleryModel::find($id);
        return view('admin/gallery', compact('data','mc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GalleryModel $GalleryModel, $id)
    {
       $messages = array(
            'image.required'  => 'Please select image',
          );
        $rules = array(
            'image' => 'required',
          );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
         return redirect( url('admin/edit_gallery/'.$id) )
                        ->withErrors($validator)
                        ->withInput();
        }else
        { 
             $fileName = null;
            if (request()->hasFile('image')) {
                $file = request()->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./admin-assets/gallery/', $fileName);
                $_POST['image'] = $fileName;    
            }

           
            unset($_POST['_token']);
            unset($_POST['id']);

           GalleryModel::where('id','=',$id)->update($_POST);
            
            return redirect( route('gallery') )->with('message', 'Updated successfully.');  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryModel $GalleryModel, $id)
    {
       // echo $id;die;
        $reminder = GalleryModel::find($id);    
        $reminder->delete();
        return redirect()->back();
    }

}
