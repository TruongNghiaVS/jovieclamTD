<?php

namespace App\Http\Controllers\Contact;
use App\Http\Controllers;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInfo;
use App\Models\Advise;
use App\Models\MailNotification;

class ContactController extends Controller
{
  

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   public function ContactRequest(Request $request)
    { 
        $error = array();
        $phone = $request->input("phone");
        $title = $request->input("title");
        $messages = $request->input("message");
        $email = $request->input("email");
        $fullName = $request->input("fullName");
        if($fullName =="" )
        {
            $itemError = new stdClass();
            $itemError->key ="fullName";
             $itemError->textError ="Yêu cầu nhập thông tin họ tên";
             array_push($error, $itemError);   
           
        }
        if($phone =="" )
        {
            $itemError = new stdClass();
            $itemError->key ="phone";
             $itemError->textError ="Yêu cầu nhập số điện thoại";
             array_push($error, $itemError);   
           
        }

        if($title =="" )
        {
            $itemError = new stdClass();
            $itemError->key ="title";
             $itemError->textError ="Yêu cầu nhập tiêu đề";
             array_push($error, $itemError);   
           
        }

        if($message =="" )
        {
            $itemError = new stdClass();
            $itemError->key ="message";
             $itemError->textError ="Yêu cầu nhập nội dung";
             array_push($error, $itemError);   
           
        }
        if(count($error) > 0)
       {
           return response()->json([
               'sucess'=>false,
               'error'=> $error ], 202);
       }
        $itemInsert = new ContactInfo();
        $itemInsert->title = $title;
        $itemInsert->email = $email;
        $itemInsert->fullName = $fullName;
        $itemInsert->messages = $messages;
        $itemInsert->phoneNumber = $phone;
        $itemInsert->save();

        return response()->json([
            'sucess'=>true], 200);
    }


    public function AdviceRequest(Request $request)
    { 
        $error = array();
        $phone = $request->input("phone");
        $citys = $request->input("citys");
        $email = $request->input("email");
        $fullName = $request->input("fullName");

        if($fullName =="" )
        {
            $itemError = new stdClass();
            $itemError->key ="fullName";
             $itemError->textError ="Yêu cầu nhập thông tin họ tên";
             array_push($error, $itemError);   
           
        }
        if($phone =="" )
        {
            $itemError = new stdClass();
            $itemError->key ="phone";
             $itemError->textError ="Yêu cầu nhập số điện thoại";
             array_push($error, $itemError);   
           
        }

      
        if(count($error) > 0)
       {
           return response()->json([
               'sucess'=>false,
               'error'=> $error ], 202);
       }
        $itemInsert = new Advise();
     
        $itemInsert->email = $email;
        $itemInsert->fullName = $fullName;
        $itemInsert->citys = $citys;
        $itemInsert->phoneNumber = $phone;
        $itemInsert->save();

        return response()->json([
            'sucess'=>true], 200);
    }

    public function NoficationEmail(Request $request)
    { 
        $error = array();

        $email = $request->input("email");

        if($email =="" )
        {
                $itemError = new stdClass();
                $itemError->key ="email";
                $itemError->textError ="Yêu cầu nhập thông tin mail";
                array_push($error, $itemError);
        }
      
      
        if(count($error) > 0)
        {
            return response()->json([
            'sucess'=>false,
            'error'=> $error ], 202);
        }
        $itemInsert = new MailNotification();
        $itemInsert->status = "1";
        $itemInsert->email = $email;
        $itemInsert->save();

        return response()->json([
            'sucess'=>true], 200);
    }
}
