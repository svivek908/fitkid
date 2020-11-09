<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Hash;
use Cookie;
use App\AdminModel\StudentModel;
use App\AdminModel\CourseModel;
use App\AdminModel\BatchModel;
use App\AdminModel\ClassModel;
use App\AdminModel\Payment;

class PaymentController extends Controller
{  

 static  public function payment_processing($amount,$orderid){
        $posturl= 'https://www.hesabe.com/authpostsingle'; 

        $data =array();
        // $data['MerchantCode'] ='642616'; // For Test
        $data['MerchantCode'] ='23640220'; // For lIVE
        $data['Ptype'] = "1";
        $data['SuccessUrl'] = url('');
        $data['FailureUrl'] = url('');
        $data['Amount'] = $amount;
        $data['orderReferenceNumber'] = $orderid;
        
        $ch = curl_init($posturl);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json","Content-Type: application/x-www-form-urlencoded;"));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        $result=curl_exec($ch);
        
        if (curl_error($ch))
        {
             return array("status"=>'failure','message'=>'Something went wrong, please try again');  
        }
    return $result=json_decode($result);
   }

  public function payment_status(Request $request){
     $input = $request->except("_token");
      $check = Payment::where('id',$input['orderReferenceNumber']);
      $json = array("result"=>false,"message"=>"Something went wrong");
      if(!$check->first()){
        $json['message'] = "id not found";
          return Response()->json($json);   
      }
      
      $save["status"] = ($input['Status'])?'Completed':'Failed';
      $save["payment_token"] = $input['PaymentToken'];
      $save["payment_id"] = $input['PaymentId'];
      $save["paid_on"] = $input['PaidOn'];
      
      
      $check->update($save);
        
        if($input['Status'] == '0'){
         $json['result'] = false;
         $json['message'] = "payment Failed";
        }else{
         $json['result'] = true;
         $json['message'] = "Payment successfull";
        }
           
          return Response()->json($json);   
  }
  


}
