<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Reading;
use DB;
use App\Model\Admin\denomination;

use App\Model\Admin\store;
use Validator;
class storesalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 //        $reading = Reading::orderBy('reading_id', 'DESC')
 //         ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))
 //         ->with('reading_route1')
 //         ->with('reading_user1')
 //         ->with('reading_store1')
 //         ->where('status','1')
 //         ->where('route_id','!=','')
 //         ->get();
 //          $denominations = denomination::orderBy('reading_id', 'DESC')->get();

 //          $store=$store=store::where('deleted_on_off', '1')->get();
 // return view('admin/storesales/index',['reading'=>$reading,'denominations'=>$denominations,'store'=>$store]); 
   



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
           $store=store::where('deleted_on_off', '1')->get();

return view('admin/storesales/index',['reading'=>$reading,'denominations'=>$denominations,'today'=>$today,'date'=>$date,'notification'=>$notification,'store'=>$store]); 



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       


 $validator = Validator::make($request->all(), 
      [
       'date' => 'required',   
       'sto_id'=>'required'
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
           
           // $date= $request->input('date');

           // $time = strtotime($date);
           // $newformat = date('d-m-Y',$time);


 $date1=$request->input('date');
            $date=$request->input('date');
      $to=  substr($date,strrpos($date,'-')+1);
         $pos = strrpos($date, "-");
       $from = substr($date,0,$pos);  
    $to1 = date('d-m-Y', strtotime($to));
     $from1 = date('d-m-Y', strtotime($from));


 //echo $st=$request->input('date');

   $st=$request->input('sto_id');
   if($st=='0')
   {

      $reading = Reading::orderBy('reading_id', 'DESC')
       
          ->where('route_id','!=','')
         ->whereBetween(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),[$from1, $to1])
         ->with('reading_route1')
         ->with('reading_user1')
         ->with('reading_store1')
         ->where('status','1')
         ->get();

        

          $denominations = denomination::orderBy('reading_id', 'DESC')
          ->whereBetween(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),[$from1, $to1])
          
          ->get();

            $notification = array(
            'message' => 'your date success.', 
            'alert-type' => 'success');



              $today=  DB::table('readings')
               
                 ->whereBetween(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),[$from1, $to1])
                 ->selectRaw('SUM(today_water_reading) as water, SUM(bottle_today_reading) as bottle, sum(salary) as salary , sum(cash_collect) as cash,sum(bottle_maintance_reading) as new_bottle')->first();

   }

else
{

  $reading = Reading::orderBy('reading_id', 'DESC')
         ->where('store_id',$st)
          ->where('route_id','!=','')
         ->whereBetween(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),[$from1, $to1])
         ->with('reading_route1')
         ->with('reading_user1')
         ->with('reading_store1')
         ->where('status','1')
         ->get();

        

          $denominations = denomination::orderBy('reading_id', 'DESC')
          ->whereBetween(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),[$from1, $to1])
          
          ->get();

            $notification = array(
            'message' => 'your date success.', 
            'alert-type' => 'success');



              $today=  DB::table('readings')
               ->where('store_id',$st)
                 ->whereBetween(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),[$from1, $to1])
                 ->selectRaw('SUM(today_water_reading) as water, SUM(bottle_today_reading) as bottle, sum(salary) as salary , sum(cash_collect) as cash,sum(bottle_maintance_reading) as new_bottle')->first();


}

       

    $store=$store=store::where('deleted_on_off', '1')->get();
            return view('admin/storesales/store',['reading'=>$reading,'denominations'=>$denominations,'val'=>$st,'today'=>$today,'date'=>$date1,'notification'=>$notification,'store'=>$store]); 
            
    }





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
