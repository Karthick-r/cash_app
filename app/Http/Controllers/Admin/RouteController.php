<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Admin\route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Validator;
use App\Model\Admin\store;

class RouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         $route=route::where('deleted_on_off', '1')->orderBy('created_at', 'DESC')->get();
        return view('admin/route/index',['route'=>$route]);  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin/route/create'); 
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
      [    'name' => 'required|string|max:255|unique:routes,route_name',
           
      ],
      [       'name.required'=>"Enter your Name",    ]);

        if ($validator->fails())
         {

            $notification = array(
            'message' => 'your data error.', 
            'alert-type' => 'warning' );      
             return redirect()->back()->withErrors($validator)->with($notification)->withInput();
         }

 else
         {
      
            $route = new route;
            $route->route_name=$request->input('name');     
            $route->save();
             $notification = array(
            'message' => 'your data inserted.', 
            'alert-type' => 'success' ); 
            return Redirect::to('route')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Admin\route  $route
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $route = route::find($id);
        if($route->status==0)
        {
        $route->status=1;

        $notification = array(
            'message' => 'Your expansive_category is Unblocked', 
            'alert-type' => 'success');
              }
              
              else
                { 
                     $route->status=0;
                     $notification = array(
            'message' => 'Your expansive_category is Unblocked', 
            'alert-type' => 'error');
              }
              

        $route->updated_at=new \DateTime();
        $route->save();

        return Redirect::to('route')->with($notification);//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\route  $route
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $route = route::find($id);
      return View::make('admin.route.edit')->with('route',$route) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin\route  $route
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $this->validate($request,
       
        [
         'name' => 'required|unique:routes,route_name, '.$id.',route_id',
       
 
        ]); 




            $route = route::find($id);           
            $route->route_name=$request->input('name');        
           
            $route->updated_at= new \DateTime();
            $route->save();

            $notification = array(
            'message' => 'Your date is updated', 
            'alert-type' => 'success');
            return Redirect::to('route')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $route = route::find($id);
            $route->deleted_on_off= 0;
            $route->deleted_at= new \DateTime();
            $route->save();


$store=store::where('route_id', $id)->get();

foreach($store as $sto)
{
$store2 = store::find($sto->store_id);
            $store2->route_id= 0;
            $store2->updated_at= new \DateTime();
            $store2->save();

}

             


                $notification = array(
            'message' => 'Your date is Deleted', 
            'alert-type' => 'success');
            return Redirect::to('route')->with($notification);
    }
}
