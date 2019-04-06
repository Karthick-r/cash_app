<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Model\Admin\store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Validator;
use auth;

use App\Model\Admin\Reading;

class StoreController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $store=store::where('deleted_on_off', '1')->orderBy('created_at', 'DESC')->get();
        return view('admin/store/index',['store'=>$store]);   //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/store/create'); 
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
      [     'name' => 'required|string|max:255|unique:stores,store_name',
            'address' => 'required',
            'phone' => 'required|numeric|unique:stores,store_phone',
      ],
      [       'name.required'=>"Enter stores Name", 
              'address.required'=>"Enter stores address",
              'phone.required'=>"Enter stores phone",   ]);

        if ($validator->fails())
         {

            $notification = array(
            'message' => 'your data error.', 
            'alert-type' => 'warning' );      
             return redirect()->back()->withErrors($validator)->with($notification)->withInput();
         }
         else
         {
      
            $store = new store;
            $store->store_name=$request->input('name');           
            $store->store_address=$request->input('address');  
            $store->store_phone=$request->input('phone');           
            $store->save();

             $store1=store::orderBy('store_id', 'DESC')->first();



            if($request->input('bottlereading')!='')
            {
              $main2=$request->input('bottlereading');
            }
            else
            {
                $main2='0';
            }

         

             if($request->input('waterreading')!='')
            {
                $maintance1=$request->input('waterreading');
            }
            else
            {
                $maintance1='0';
            }
            
      $reading = new Reading;
      $reading->bottle_reading=$main2;
      $reading->today_water_reading='0';
   
      $reading->water_reading=$maintance1; 
       $reading->bottle_today_reading='0'; 
    
      $reading->store_id=$store1->store_id;
      $reading->status='0';
      $reading->user_id=Auth::user()->id;
      $reading->save();            

          



             $notification = array(
            'message' => 'your data inserted.', 
            'alert-type' => 'success' ); 
            return Redirect::to('store')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Admin\store  $store
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $store = store::find($id);
        if($store->status==0)
        {
        $store->status=1;

        $notification = array(
            'message' => 'Your expansive_category is Unblocked', 
            'alert-type' => 'success');
              }
              
              else
                { 
                     $store->status=0;
                     $notification = array(
            'message' => 'Your expansive_category is Unblocked', 
            'alert-type' => 'error');
              }
              

        $store->updated_at=new \DateTime();
        $store->save();

        return Redirect::to('store')->with($notification);//
        
    }

    
    public function edit($id)
    {
      $store = store::find($id);
      return View::make('admin.store.edit')->with('store',$store) ;
    }

   
    public function update(Request $request, $id)
    {
   
   $store_id=$id;
        $this->validate($request,
       
        [
         'name' => 'required|unique:stores,store_name, '.$id.',store_id',
         'phone' => 'required|unique:stores,store_phone, '.$id.',store_id'
      
 
        ]); 




            $store = store::find($id);           
            $store->store_name=$request->input('name');           
            $store->store_address=$request->input('address');  
            $store->store_phone=$request->input('phone'); 
            $store->updated_at= new \DateTime();
            $store->save();

            $notification = array(
            'message' => 'Your date is updated', 
            'alert-type' => 'success');
            return Redirect::to('store')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            $store = store::find($id);
            $store->deleted_on_off= 0;
            $store->deleted_at= new \DateTime();
            $store->save();
                $notification = array(
            'message' => 'Your date is Deleted', 
            'alert-type' => 'success');
            return Redirect::to('store')->with($notification);
        
    }
}
