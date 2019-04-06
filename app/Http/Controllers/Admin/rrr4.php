<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

use App\Model\Admin\Reading;

use App\Model\Admin\denomination;
use App\Model\Admin\store;
use Validator;
use App\Model\Admin\route;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
         $today=  DB::table('readings')
                  ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))
                 ->selectRaw('SUM(today_water_reading) as water, SUM(bottle_today_reading) as bottle, sum(salary) as salary , sum(cash_collect) as cash,sum(bottle_maintance_reading) as new_bottle')->first();



 $reading = Reading::orderBy('reading_id', 'DESC')
   ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),'01-10-2018')
         ->with('reading_route1')
         ->with('reading_user1')
         ->with('reading_store1')
         ->where('status','1')
         ->get();


         // $user_info = DB::table('readings')
         //         ->select('route_id', DB::raw('sum(cash_collect) as total'))
                 
         //          ->groupBy(DB::raw("(created_at)"))
         //         ->get();

// $vv=Reading::orderBy('reading_id', 'DESC')
// ->select('route_id',DB::raw('sum(cash_collect) as `amount`'),DB::raw('YEAR(created_at) year, monthname(created_at) month'),DB::raw("(SELECT route_name FROM routes
//                           WHERE route_id=readings.route_id   ) as route_name"))
//                ->groupby('year','MONTH')
//                 ->groupby('route_id')
//                 ->where('route_id','!=','0')

               
//                ->get();




$report=Reading::orderBy('reading_id', 'DESC')
->select(DB::raw('sum(cash_collect) as `y`'),DB::raw("DATE_FORMAT(created_at, '%Y-%M') as label"),DB::raw("(SELECT route_name FROM routes
                          WHERE route_id=readings.route_id   ) as route_name"))
               ->groupby('label')
                ->groupby('route_id')
                ->where('route_id','!=','0')

               
               ->get();



// $report1=Route::select(DB::raw("(SELECT sum('cash_collect') FROM readings
//                           WHERE route_id=routes.route_id    ) as route_name"))
              

               
//                ->get();


  $notification = array(
            'message' => 'your date success.', 
            'alert-type' => 'success');


       // return view('admin.home');

         //
//$vv=json_encode($report);
          return view('admin/home',['today'=>$today,'notification'=>$notification ,'report'=>$report]);

//  $json = json_encode($report);

  //return View::make('admin/home', compact('json','today'));

//return response()->json($report);

    }

    public function notification()
    {
        $notification = array(
            'message' => 'Thanks! We shall get back to you soon.', 
            'alert-type' => 'info'
        );

        session(['notification' => $notification]);
        //session()->set('notification',$notification);
        return view('notification');
    }
}
