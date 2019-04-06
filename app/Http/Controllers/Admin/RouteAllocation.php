<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\route;
use App\Model\Admin\route_user;
use App\User;
use Illuminate\Support\Facades\View;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Model\Admin\relationship;
use App\Model\Admin\store;
class RouteAllocation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $route=route::where('deleted_on_off', '1')->with('users')->with('stores_route')->orderBy('created_at', 'DESC')->get();
        $users = User::where('deleted_on_off','1')->where('role_id','0')->where('status','1')->orderBy('created_at', 'DESC')->get();

        return view('admin/routeallocation/index',['route'=>$route,'users'=>$users]); 
        
    }

     public function getorder($id,$id1)
     {
        if($id==$id1)
        {
           return Redirect::to('routeallocation'); 
        }
        else
        {
          
          $route1 =route::where('user_id',$id)->first();
           $route2 =route::where('user_id', '=', $id1)->first();
           $route1->user_id=$id1;
           $route1->save();
           $route2->user_id=$id;    
           $route2->save();
        return redirect()->to('routeallocation'); 

        }

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
      $route = route::with('users')->find($id);
      $users = DB::table('users')
            ->leftJoin('routes', 'users.id', '=', 'routes.user_id')
            ->where('users.role_id','0')
            ->get();
           // echo $users;
             //return response()->json($users); 
      return View('admin.routeallocation.edit1',['route'=>$route,'users'=>$users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $route = route::with('users')->find($id);
      $users = DB::table('users')
            ->leftJoin('routes', 'users.id', '=', 'routes.user_id')
            ->where('users.role_id','0')
            ->get();
           // echo $users;
             //return response()->json($users); 
      return View('admin.routeallocation.edit',['route'=>$route,'users'=>$users]);
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
         'user_id' => 'required',      
 
        ]); 



            $route = route::find($id);           
            $route->user_id=$request->input('user_id');     
            $route->updated_at= new \DateTime();
            $route->save();



            $notification = array(
            'message' => 'Your date is updated', 
            'alert-type' => 'success');
            return Redirect::to('routeallocation')->with($notification);


    }


     public function update1(Request $request, $id)
    {
       
$this->validate($request,
       
        [
         'user_id' => 'required',
       
 
        ]); 



            $route = route::find($id);           
            $route->user_id=$request->input('user_id');     
            $route->updated_at= new \DateTime();
            $route->save();


            $notification = array(
            'message' => 'Your date is updated', 
            'alert-type' => 'success');
            return Redirect::to('routeallocation')->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $route = route::find($id);
        $route->user_id=0;
        $route->updated_at= new \DateTime();
        $route->save();
        $notification = array(
            'message' => 'Your Route  is Deleted', 
            'alert-type' => 'warning');
        return Redirect::to('routeallocation')->with($notification); //
    }
}
