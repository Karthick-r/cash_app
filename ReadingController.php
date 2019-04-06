<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\expansive_category;
use App\Model\Admin\route;

use App\Model\Admin\Reading;
use App\Model\Admin\denomination;
use App\Model\Admin\expanses;
use App\Model\Admin\price;
use DB;

class ReadingController extends Controller
{


  public function __construct()
    {
        $this->middleware('auth:api');
    }
 


 public function dashboard($u_id)
    {
      
 // $cash=  DB::table('readings')->where('user_id',$u_id)->where('route_id',$r_id)
 //                 ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))
 //                 ->selectRaw('SUM(cash_collect) as cash_collect')->first();
 //                  print_R($cash);

       $route=route::where('deleted_on_off', '1')->where('user_id',$u_id)->first();

       if($route=='')
       {
        $success['route_id']=0;
  return response()->json([ 'status' => 'OK','dashboard' => $success], 200);
       }
       else
       {

       $r_id=$route->route_id;

                 $cash= DB::table('readings')->where('user_id',$u_id)->where('route_id',$r_id)->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))->sum('cash_collect');
                
               
                  if($cash=='')
                 {
                  $cash1=0;

                 }
                 else
                 {
                  $cash1=$cash;

                 }



                  $expanse= DB::table('expanses')->where('user_id',$u_id)->where('route_id',$r_id)->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))->sum('amount');
                

  if($expanse=='')
                 {
                  $expanse1=0;

                 }
                 else
                 {
                  $expanse1=$expanse;

                }

 $hand= $cash1-$expanse1;
$route=route::where('route_id',$r_id)->first();
//echo $route['route_name'];
$store= DB::table('stores')->where('route_id',$r_id)->count('store_id');



                 $success['collect_cash'] =  $cash1;
                 $success['expanse_cash'] =  $expanse1;
                 $success['hand_cash'] =  $hand;
                   $success['store'] =  $store;
                   $success['route_id']=$r_id;
                   $success['route']=$route['route_name'];
                 // return response()->json([ 'status' => 'Success' ,'success' => $cash]), 200);  
                  return response()->json([ 'status' => 'OK','dashboard' => $success], 200);


    }
}

   
    public function index(Request $request,$id)
    {

            

            $reading = Reading::where('store_id',$id)->where('status','0')->get();

         

            if($reading->count()=='1' )
            {
            

            return response()->json([ 'status' => 'OK','message' => 'Call to admin'], 200);

            }

            else
            {
              $date=$request->input('date'); 
             // echo $date;


if($date!='')
{

$date2= date('d-m-Y', strtotime('-1 day', strtotime($date)));
 
$today_salary=  DB::table('readings')->where('store_id',$id)
                  ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),$date)
                  ->sum('salary');
                  $today_water=  DB::table('readings')->where('store_id',$id)
                  ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),$date)
                  ->sum('today_water_reading');

                  $today_bottle=  DB::table('readings')->where('store_id',$id)
                  ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),$date)
                  ->sum('bottle_today_reading');
                  $today_new_bottle=  DB::table('readings')->where('store_id',$id)
                  ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),$date)
                  ->sum('bottle_maintance_reading');
                 //->selectRaw('SUM(today_water_reading) as water, SUM(bottle_today_reading) as bottle, sum(bottle_maintance_reading) as new_bottle , sum(salary) as salary')->first();


   $success['new_bottle']  =$today_new_bottle;
 // echo $today[0];
  $success['today_water'] =$today_water;
  $success['today_bottle'] =$today_bottle;
   $success['today_salary'] =$today_salary; 


 $today_closing=Reading::where('store_id',$id)
->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),$date)->orderBy('reading_id', 'DESC')->first();

if($today_closing=='')
{
$success['water_close_reading']  ="-";
$success['bottle_close_reading'] ="-"; 
}

else
{
$success['water_close_reading']  =$today_closing['water_reading'];
$success['bottle_close_reading'] =$today_closing['bottle_reading'];   
  }             

$today_opening=Reading::where('store_id',$id)
->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),'<',$date)->orderBy('reading_id', 'DESC')
->first();
if($today_opening=='')
{
  $today_opening2=Reading::where('store_id',$id)
->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),'=',$date)->orderBy('reading_id', 'DESC')
->skip(1)->take(1)->first();


  $success['water_open_reading']  =$today_opening2['water_reading'];
  $success['bottle_open_reading'] =$today_opening2['bottle_reading'];
}
else
{

  $success['water_open_reading']  =$today_opening['water_reading'];
  $success['bottle_open_reading'] =$today_opening['bottle_reading'];

}




}

else
{



  

             $last_reading= Reading::where('store_id',$id)->orderBy('reading_id', 'DESC')->first(); 

            $price=price::orderBy('created_at', 'DESC')->first();      

    
     $success['water_open_reading']=$last_reading->water_reading;
     $success['bottle_open_reading']=$last_reading->bottle_reading;
     $success['water_price']=$price->water_price;
     $success['bottle_price']=$price->bottle_price;


}

 $start= Reading::where('store_id',$id)->orderBy('reading_id', 'ASC')->first();


     $success['started_date']=date("d.m.Y", strtotime($start->created_at)); 
              return response()->json( $success);
          
            }

        
    }

    public function create()
    {


       
    }



  
    public function store(Request $request,$s_id,$r_id,$u_id)
    {

      $reading = new Reading;
      $reading->water_reading=$request->input('water_reading'); 
      $reading->water_maintance_reading=$request->input('water_maintance_reading'); 
      $reading->today_water_reading=$request->input('water_today_reading'); 
      $reading->bottle_reading=$request->input('bottle_reading'); 
      $reading->bottle_maintance_reading=$request->input('bottle_maintance_reading'); 
      $reading->bottle_today_reading=$request->input('bottle_today_reading'); 

      $reading->water_price=$request->input('water_price'); 
      $reading->bottle_price=$request->input('bottle_price'); 
       
      $reading->store_id=$s_id;
      $reading->route_id=$r_id;
      $reading->user_id=$u_id;
      $reading->salary=$request->input('salary');
      $reading->cash_collect=$request->input('cash_collect');
      
      $reading->save(); 
      
      $reading1 = Reading::orderBy('reading_id','desc')->first();
      $reading_id3=$reading1->reading_id;

            $denomination = new denomination;
            $denomination->rs_2000= $request->input('rs_2000');
            $denomination->rs_500 = $request->input('rs_500');
            $denomination->rs_200 = $request->input('rs_200');
            $denomination->rs_100 = $request->input('rs_100');
            $denomination->rs_50 = $request->input('rs_50');
            $denomination->rs_20 = $request->input('rs_20');
            $denomination->rs_10 = $request->input('rs_10');
            $denomination->rs_5 = $request->input('rs_5');
            $denomination->rs_2 = $request->input('rs_2');
            $denomination->rs_1 = $request->input('rs_1');
            $denomination->reading_id =$reading_id3;
            $denomination->save(); 

             return response()->json([ 'status' => 'OK','success' => 'Your Cash Collected'], 200);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$u_id,$r_id,$date)
    {
       
// $expanses=expanses::where('user_id',$u_id)->where('route_id',$r_id)
// ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),$date)
// ->with('ex_pan')
// ->get();


$expanses = DB::table('expanses')
         
           ->join('expansive_categories', 'expansive_categories.categories_id', '=', 'expanses.cat_id')
           ->where('expanses.user_id',$u_id)
           ->where('expanses.route_id',$r_id)
           ->where(DB::raw("(DATE_FORMAT(expanses.created_at,'%d-%m-%Y'))"),$date)
        ->select('expanses.*', 'expansive_categories.categories_name as category')
           ->get();





   return response()->json([ 'status' => 'OK','expanses_list' => $expanses], 200);

    }

        public function show()
    {
     
 $category=expansive_category::where('deleted_on_off', '1')->orderBy('categories_id', 'desc')->get();

  return response()->json([ 'status' => 'OK','category' => $category], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$u_id,$r_id)
    {
      
            $expanses = new expanses;
            $expanses->cat_id= $request->input('cat_id');
            $expanses->amount= $request->input('amount');
            $expanses->user_id = $u_id;
            $expanses->route_id = $r_id;
            $expanses->save();             

 $expanses1=expanses::where('user_id',$u_id)->where('route_id',$r_id)
->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y'))"),date('d-m-Y'))
->with('ex_pan')
->get();

   
     return response()->json([ 'status' => 'OK','success' => $expanses1], 200);

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




 public function transfer(Request $request,$u_id,$r_id)
    {


$date=$request->input('date'); 
if($date!='')
{

$date1=$date;
}
else
{
$date1=date('d-m-Y');
}
   
$expanses1 = DB::table('expanses')
         
           ->join('expansive_categories', 'expansive_categories.categories_id', '=', 'expanses.cat_id')

           ->where('expanses.user_id',$u_id)
           ->where('expanses.route_id',$r_id)
           ->where(DB::raw("(DATE_FORMAT(expanses.created_at,'%d-%m-%Y'))"),$date1)
            ->select('expanses.amount as amount', DB::raw("DATE_FORMAT(expanses.created_at, '%h:%i %p') as date_time"), 'expansive_categories.categories_name as name',
             DB::raw("DATE_FORMAT(expanses.created_at, '%H%i') as sorttime")  )
            ->addSelect(DB::raw("'Expense' as type"))
            ->orderBy('expanses.created_at', 'DESC')
           ->get();
           //$expanses1['rr']=1;

   

          $cash= DB::table('readings')
 ->join('stores', 'stores.store_id', '=', 'readings.store_id')
          ->where('readings.user_id',$u_id)->where('readings.route_id',$r_id)
          ->where(DB::raw("(DATE_FORMAT(readings.created_at,'%d-%m-%Y'))"),$date1)
          ->orderBy('readings.created_at', 'DESC')
           ->select('readings.cash_collect as amount', DB::raw("DATE_FORMAT(readings.created_at, '%h:%i %p') as date_time"),'stores.store_name as name'
             ,DB::raw("DATE_FORMAT(readings.created_at, '%H%i') as sorttime"))
           ->addSelect(DB::raw("'CashCollected' as type"))
          ->get();
            //$cash['rr']=2;
 
$transaction=array();
$transaction=$expanses1->merge($cash);
//echo $ss;
//print_r($ss);
//arsort($ss);

//echo $ss[0];

//ksort($ss);

   
// $vvv = DB::table('expanses')
         
//            ->join('expansive_categories', 'expansive_categories.categories_id', '=', 'expanses.cat_id')
//             ->join('readings', 'readings.user_id', '=', 'expanses.user_id')
//             ->join('readings', 'readings.route_id', '=', 'expanses.route_id')
//            ->where('expanses.user_id',$u_id)
//            ->where('expanses.route_id',$r_id)
//            ->where(DB::raw("(DATE_FORMAT(expanses.created_at,'%d-%m-%Y'))"),date('d-m-Y'))
//             ->select('expanses.amount as amount', DB::raw("DATE_FORMAT(expanses.created_at, '%h:%i %p') as date_time"), 'expansive_categories.categories_name as name'  )
//             ->addSelect(DB::raw("'expanse' as type"))
//             ->orderBy('expanses.created_at', 'DESC')
//            ->get();


         // return response()->json([ 'status' => 'OK','dashboard' => $expanses1,'cash'=>$cash
           // ,'ss'=>$ss], 200);


          return response()->json([ 'status' => 'OK','transaction'=>$transaction], 200);

    }



}
