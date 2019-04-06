<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\route;
use Illuminate\Support\Facades\Redirect;

use App\User;
use Illuminate\Support\Facades\View;
use DB;
use Validator;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index($id)
    // {
    //     $route=route::where('deleted_on_off', '1')->with('users')->where
    //     ('user_id',$id)->first();

    //     return response()->json([ 'status' => 'Success' ,'success' => $route], 200);


    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create($id)
    // {
    //     $route=route::where('deleted_on_off', '1')->with('stores_route')->with('users')->where
    //     ('route_id',$id)->get();
    //       return response()->json([ 'status' => 'Success' ,'success' => $route], 200);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


   public function __construct()
    {
        $this->middleware('auth:api');
    }
 


    public function store(Request $request ,$id)
    {

         $route=route::where('deleted_on_off', '1')->
         with('users')->withCount('users')->with('stores_route')->withCount('stores_route')
         ->where('user_id',$id)->first();


        if($route->stores_route_count=='0')
        {

       return response()->json([ 'status' => 'Success','Store'=>'Your store not allowcated' ,'success' => $route], 200);
        }
        else
        {

            return response()->json($route);

        }    

     
         


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
    public function reading($id)
    {


        
    
    }



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
