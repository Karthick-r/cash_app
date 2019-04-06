<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Reading;
use DB;
use App\Model\Admin\denomination;
use Validator;

class ReportController extends Controller
{
   
    public function index()
    {

         $reading = Reading::orderBy('reading_id', 'DESC')
         ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))
         ->with('reading_route1')
         ->with('reading_user1')
         ->with('reading_store1')
         ->where('status','1')
         ->get();

 $total_water_reading = Reading::where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))
         ->sum('today_water_reading');

          $total_bottle_reading = Reading::where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))
         ->sum('bottle_today_reading');



 $total_salary = Reading::where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))
         ->sum('salary');


$total_cashcollect=Reading::where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))
         ->sum('cash_collect');



          $denominations = denomination::orderBy('reading_id', 'DESC')->get();
         // print_r($reading);

          return response()->json([ 'status' => 'OK','last_reading' => $reading], 200);
//return view('admin/report/daily',['reading'=>$reading,'denominations'=>$denominations,'total_water_reading'=>$total_water_reading,'total_bottle_reading'=>$total_bottle_reading,'total_salary'=>$total_salary,'total_cashcollect'=>$total_cashcollect]); 
        
  
    }

    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), 
      [
       'date' => 'required',   
      ]);

        if ($validator->fails())
         {

            $notification = array(
            'message' => 'Click Date to Filter.', 
            'alert-type' => 'warning' );      
             return redirect()->back()->withErrors($validator)->with($notification);
         }

         else
         {
           
           $date= $request->input('date');

           $time = strtotime($date);
           $newformat = date('d-m-Y',$time);

         $reading = Reading::orderBy('reading_id', 'DESC')
         ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),$newformat)
         ->with('reading_route1')
         ->with('reading_user1')
         ->with('reading_store1')
         ->where('status','1')
         ->get();
       //  

          $denominations = denomination::orderBy('reading_id', 'DESC')
          ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),$newformat)
          
          ->get();

            $notification = array(
            'message' => 'your date success.', 
            'alert-type' => 'success');

           // print_r($reading);
           // print_r($denominations);
            //print_r($notification);
            return redirect()->back()->with($notification,$denominations,$reading);
          
 //return response()->json([ 'status' => 'Success' ,'success' => $reading,'deno'=>$denominations,'noti'=>$notification], 200);
          }



    }

   
}
