<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Model\Admin\route;
use Validator;
use Illuminate\Support\Facades\View;


use App\user;
use App\Model\Admin\Reading;

use App\Model\Admin\denomination;
use App\Model\Admin\store;



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
                 ->selectRaw('SUM(today_water_reading) as water, SUM(bottle_today_reading) as bottle, sum(salary) as salary , sum(cash_collect) as cash,sum(bottle_maintance_reading) as new_bottle ,SUM(water_maintance_reading) as main_water')->first();

 $yesday=  DB::table('readings')
                  ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y',strtotime('-1 days')))
                   ->sum('bottle_reading');

   $expanses_today=  DB::table('expanses')
                  ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))
                 ->selectRaw('SUM(amount) as amount')->first();


  $notification = array(
            'message' => 'your date success.', 
            'alert-type' => 'success');


$bottle=Reading::orderBy('reading_id', 'DESC')
->select(DB::raw("(SELECT route_name FROM routes
                          WHERE route_id=readings.route_id   ) as label"),DB::raw('sum(bottle_today_reading) as `y`'))
              
                ->groupby('route_id')
                ->where('route_id','!=','0')
 ->where(DB::raw("(DATE_FORMAT(created_at,'%m-%Y'))"),date('m-Y'))
               
               ->get();

               $report1=reading::select(DB::raw('sum(cash_collect) as `y`'),DB::raw("DATE_FORMAT(created_at, '%Y-%M') as label"),DB::raw("(SELECT route_name FROM routes
                          WHERE route_id=readings.route_id   ) as route_name"))->groupby('label')
                ->groupby('route_id')
                ->where('route_id','!=','0')

               
               ->get();


$vv=Reading::orderBy('reading_id', 'DESC')
->select(DB::raw("(SELECT route_name FROM routes
                          WHERE route_id=readings.route_id   ) as label"),DB::raw('sum(today_water_reading) as `y`'))
              
                ->groupby('route_id')
                ->where('route_id','!=','0')
 ->where(DB::raw("(DATE_FORMAT(created_at,'%m-%Y'))"),date('m-Y'))
               
               ->get();


       // return view('admin.home');
    $route=route::where('deleted_on_off', '1')->get();

//print_R($yesday);

           return view('admin/home',['today'=>$today,'notification'=>$notification,'vv'=>$vv,'route'=>$route,'bottle'=>$bottle,'report1'=>$report1,'expanses_today'=>$expanses_today, 'yesday'=>$yesday]); 

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



     public function get_route($id)
    {


             $route=route::where('deleted_on_off', '1')->get();


      if($id=='0')
      {
        // $events=Events::where('eventdate', '>=',date('Y-m-d'))->orderBy('created_at', 'desc')->get();

         $today=  DB::table('readings')
                  ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))
                 ->selectRaw('SUM(today_water_reading) as water, SUM(bottle_today_reading) as bottle, sum(salary) as salary , sum(cash_collect) as cash,sum(bottle_maintance_reading) as new_bottle')->first();
 $expanses_today=  DB::table('expanses')
                  ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))
                 ->selectRaw('SUM(amount) as amount')->first();

      }
    
      else
      {
         $today=  DB::table('readings')
                  ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))
                  ->where('route_id',$id)
                 ->selectRaw('SUM(today_water_reading) as water, SUM(bottle_today_reading) as bottle, sum(salary) as salary , sum(cash_collect) as cash,sum(bottle_maintance_reading) as new_bottle')->first();

                  $expanses_today=  DB::table('expanses')
                  ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))
                   ->where('route_id',$id)
                 ->selectRaw('SUM(amount) as amount')->first();
      }
       
        return view('admin/home_route',['today'=>$today,'route'=>$route,'id'=>$id,'expanses_today'=>$expanses_today]);
       // echo $news;

    }
}
