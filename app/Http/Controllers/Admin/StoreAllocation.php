<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\store;
use App\Model\Admin\route;
use App\Model\Admin\routes_stores;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Validator;
use App\Model\Admin\relationship;

class StoreAllocation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store=store::where('deleted_on_off', '1')->with('route_store')->orderBy('created_at', 'DESC')->get();
         $route=route::where('deleted_on_off', '1')->orderBy('created_at', 'DESC')->get();
        
        //echo $store;//
        return view('admin/storeallocation/index',['store'=>$store,'route'=>$route]);  
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
      [     'action' => 'required',
            'checked_id' => 'required',
          
      ],
      [       'action.required'=>"Select Route ",  
        'checked_id.required'=>"Select One station ",  ]);

        if ($validator->fails())
         {

            $notification = array(
            'message' => 'Select Route or station', 
            'alert-type' => 'warning' );      
             return redirect()->back()->withErrors($validator)->with($notification)->withInput();
         }

 else
         {
      
            
            $route_id=$request->input('action');
              $check = $request->input('checked_id');
             $check_all = implode(',', $check);           
            

            foreach($check as $chec)
            {
            
            //echo $chec;
            $store = store::find($chec);           
            $store->route_id=$route_id;     
            $store->updated_at= new \DateTime();
            $store->save(); 
            }

            // $admin->password=bcrypt($request->input('password'));  
            //  $admin->phone=$request->input('phone');           
            // $admin->status=1;
            // $admin->deleted_on_off=1;
            // $admin->role_id=0;
            // $admin->created_at= new \DateTime();
            // $admin->save();
              $notification = array(
             'message' => 'your data inserted.', 
             'alert-type' => 'success' ); 
             return Redirect::to('storeallocation')->with($notification);
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
      $store = store::with('route_store')->find($id);
      $route=route::where('deleted_on_off', '1')->get();
           // echo $users;
             //return response()->json($users); 
      return View('admin.storeallocation.edit1',['store'=>$store,'route'=>$route]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $store = store::find($id);
      $route=route::where('deleted_on_off', '1')->get();
           // echo $users;
             //return response()->json($users); 
      return View('admin.storeallocation.edit',['store'=>$store,'route'=>$route]);
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
       $this->validate($request,
       
        [
         'route_id' => 'required',
        ]); 

            $store = store::find($id);           
            $store->route_id=$request->input('route_id');     
            $store->updated_at= new \DateTime();
            $store->save(); 
            $notification = array(
            'message' => 'Your date is updated', 
            'alert-type' => 'success');
            return Redirect::to('storeallocation')->with($notification);
    }


     public function update1(Request $request, $id)
    {
       
$this->validate($request,
       
        [
         'route_id' => 'required',
       
 
        ]); 

            $store = store::find($id); 
            $store->route_id=$request->input('route_id');     
            $store->updated_at= new \DateTime();
            $store->save();


            $notification = array(
            'message' => 'Your date is updated', 
            'alert-type' => 'success');
            return Redirect::to('storeallocation')->with($notification);


    }


 public function delete( $id)
    {
       
 $store = store::find($id);
        $store->route_id=0;
        //$store->updated_at= new \DateTime();
        $store->save();
        $notification = array(
            'message' => 'Your Route  is Deleted', 
            'alert-type' => 'warning');
         return redirect()->back()->with($notification);
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
        // $store = store::find($id);
        // $store->route_id=0;
        // //$store->updated_at= new \DateTime();
        // $store->save();
        // $notification = array(
        //     'message' => 'Your Route  is Deleted', 
        //     'alert-type' => 'warning');
        // return Redirect::to('storeallocation')->with($notification); //
    }
}
