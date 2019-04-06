<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\store;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Validator;

use App\Model\Admin\Reading;
use DB;
use auth;

class FirstReading extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      

       $store1=DB::table('stores')
        ->leftJoin('readings','stores.store_id', '=', 'readings.store_id')
       
        ->select('stores.*',
            'readings.water_reading as water_reading',
            'readings.water_maintance_reading as  water_maintance_reading',
            'readings.bottle_reading as bottle_reading',
            'readings.bottle_maintance_reading as  bottle_maintance_reading')
            ->where('readings.status','0')
            ->orderBy('stores.created_at', 'DESC')
            
        ->get();
         return view('admin/firstreading/index',['store1'=>$store1]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
 $reading = Reading::orderBy('created_at','asc')->where('store_id', $id)
         ->first();
         $reading->status='1';
         $reading->updated_at=new \DateTime();
        $reading->save();

                     $notification = array(
            'message' => 'Your firstreading is started', 
            'alert-type' => 'error');
             



        return Redirect::to('firstreading')->with($notification);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $store=DB::table('stores')
       ->leftJoin('readings','stores.store_id', '=', 'readings.store_id')
       
        ->select('stores.*',
            'readings.water_reading as water_reading',
            'readings.water_maintance_reading as  water_maintance_reading',
            'readings.bottle_reading as bottle_reading',
            'readings.bottle_maintance_reading as  bottle_maintance_reading')
            ->where('readings.status','0')
            ->where('stores.store_id',$id)
           
        ->first();

 return view('admin.firstreading.edit',['store'=>$store]);
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
      
 $validator = Validator::make($request->all(), 
      [    'bottlereading' => 'required',
           'waterreading' => 'required',
           
      ],
      [       'bottlereading.required'=>"Enter Bottle Reading", 
              'waterreading.required'=>"Enter Water Reading",   ]);



 if ($validator->fails())
         {

            $notification = array(
            'message' => 'your data error.', 
            'alert-type' => 'warning' );      
             return redirect()->back()->withErrors($validator)->with($notification)->withInput();
         }

 else
         {
      
            $store = store::find($id);     
           if($request->input('bottlemainreading')!='')
            {
                $main1=$request->input('bottlemainreading');
            }
            else
            {
                $main1='0';
            }

             if($request->input('watermainreading')!='')
            {
                $maintance=$request->input('watermainreading');
            }
            else
            {
                $maintance='0';
            }

            
      $reading =  Reading::where('store_id',$id)->where('status','0')->first();
      $reading->bottle_reading=$request->input('bottlereading');
      $reading->bottle_maintance_reading=$main1;  
      $reading->water_reading=$request->input('waterreading');  
      $reading->water_maintance_reading=$maintance;
       $reading->user_id=Auth::user()->id;   
      $reading->save();

     

            $notification = array(
            'message' => 'Your date is updated', 
            'alert-type' => 'success');
            return Redirect::to('firstreading')->with($notification);
        }



        




           
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
