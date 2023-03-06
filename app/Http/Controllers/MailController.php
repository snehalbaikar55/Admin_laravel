<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use App\Mail\contact;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class MailController extends Controller {
   public function basic__email(Request $request) { 
     // $data = array('name'=>"Virat Gandhi");
     $mailData = $request->all();
    //$name = $request->name;
    //return response()->json($mailData);

    $email = 'snehalshivkar2@gmail.com';
   
    \Mail::to($email)->send(new contact($mailData));

      return response()->json([
         'message' => 'Email has been sent.'
     ], Response::HTTP_OK);
   }
   public function basic_email(Request $request) { 
    $issend=true;
      $name=$request->name;
      $email=$request->email;
      $mobile=$request->mobile;
      
      $logfile= 'email.txt';
      
      $IP = $_SERVER['REMOTE_ADDR'];
      date_default_timezone_set("Asia/Kolkata");   
      //India time (GMT+5:30)
      $date = date('d-m-Y H:i:s');
      $logdetails= $date . ': ' . 'Visitor ip='.$_SERVER['REMOTE_ADDR'] .' '. 'Name ='.$name .' '.'Email='.$email .' '.'Mobile='.$mobile;
      
      // open the file for reading and writing
      $fp = fopen($logfile, "a+");
      
      // write out new log entry to the beginning of the file
      fwrite($fp, $logdetails, strlen($logdetails));
      file_put_contents($logfile,"\r\n",FILE_APPEND);
      fclose($fp);

      $mailData = $request->all();
      $email = 'snehalshivkar2@gmail.com';
      Mail::to($email)->send(new contact($mailData));
      return response()->json($issend);
      
    }
  
}