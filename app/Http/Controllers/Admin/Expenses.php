<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
use App\AdminModel\ExpensesModel;

class Expenses extends Controller
{  
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  ExpensesModel::all();
        return view('admin/expenses', compact('data'));
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
            'name.required'  => 'Please enter expenses',
            'amount.required'  => 'Please enter amount',
          );
        $rules = array(
            'name' => 'required',
            'amount' => 'required',
          );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
            return redirect( route('expenses') )
                        ->withErrors($validator)
                        ->withInput();
        }else
        {
            
            ExpensesModel::create([
            
               'name' => $request->name,
               'amount' => $request->amount,
                
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
    public function edit(ExpensesModel $ExpensesModel, $id)
    {   
        $data =  ExpensesModel::all();
        $mc = ExpensesModel::find($id);
        return view('admin/expenses', compact('data','mc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpensesModel $ExpensesModel, $id)
    {
       $messages = array(
            'type.required'  => 'Please select type',
          );
        $rules = array(
            'type' => 'required',
          );

        $validator = Validator::make(Input::all(), $rules,$messages);

        if($validator->fails()) {
         return redirect( url('admin/edit_expenses/'.$id) )
                        ->withErrors($validator)
                        ->withInput();
        }else
        { 
           

           
            unset($_POST['_token']);
            unset($_POST['id']);

           ExpensesModel::where('id','=',$id)->update($_POST);
            
            return redirect( route('expenses') )->with('message', 'Updated successfully.');  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpensesModel $ExpensesModel, $id)
    {
        $reminder = ExpensesModel::find($id);    
        $reminder->delete();
    }

}
