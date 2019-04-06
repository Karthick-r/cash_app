<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Reading;
use DB;
use App\Model\Admin\denomination;
use App\Model\Admin\store;
use Validator;

class ReportController extends Controller
{
   
    public function index()
    {
  $reading = Reading::orderBy('reading_id', 'DESC')
  ->where('route_id','!=','')
   ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))
         ->with('reading_route1')
         ->with('reading_user1')
         ->with('reading_store1')
         ->where('status','1')
         ->get();
 $date= date('d F ,Y');
           $time = strtotime($date);
           $newformat = date('d-m-Y',$time);

              $today=  DB::table('readings')
                  ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),$newformat)
                 ->selectRaw('SUM(today_water_reading) as water, SUM(bottle_today_reading) as bottle, sum(salary) as salary , sum(cash_collect) as cash,sum(bottle_maintance_reading) as new_bottle')->first();

  $notification = array(
            'message' => 'your date success.', 
            'alert-type' => 'success');

          $denominations = denomination::orderBy('reading_id', 'DESC')->get();

return view('admin/report/daily',['reading'=>$reading,'denominations'=>$denominations,'today'=>$today,'date'=>$date,'notification'=>$notification]); 

//print_R($today);
        
  
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
          ->where('route_id','!=','')
         ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),$newformat)
         ->with('reading_route1')
         ->with('reading_user1')
         ->with('reading_store1')
         ->where('status','1')
         ->get();

        

          $denominations = denomination::orderBy('reading_id', 'DESC')
          ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),$newformat)
          
          ->get();

            $notification = array(
            'message' => 'your date success.', 
            'alert-type' => 'success');



              $today=  DB::table('readings')
                 ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),$newformat)
                 ->selectRaw('SUM(today_water_reading) as water, SUM(bottle_today_reading) as bottle, sum(salary) as salary , sum(cash_collect) as cash,sum(bottle_maintance_reading) as new_bottle')->first();


            return view('admin/report/daily',['reading'=>$reading,'denominations'=>$denominations,'today'=>$today,'date'=>$date,'notification'=>$notification]); 
          }



    }

   
}
