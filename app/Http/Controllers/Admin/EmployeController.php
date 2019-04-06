<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use App\user;
use Illuminate\Support\Facades\View;
use DB;
use Validator;
use App\Model\Admin\route;


class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $admins=User::where('deleted_on_off', '1')->where('role_id','0')->orderBy('created_at', 'DESC')->get();
        return view('admin/employe/index',['admins'=>$admins]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/employe/create'); 
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
      [     'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|numeric|unique:users',
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
      
            $admin = new User;
            $admin->name=$request->input('name');           
            $admin->password=bcrypt($request->input('password'));  
             $admin->phone=$request->input('phone');           
            $admin->status=1;
            $admin->deleted_on_off=1;
            $admin->role_id=0;
            $admin->created_at= new \DateTime();
            $admin->save();
             $notification = array(
            'message' => 'your data inserted.', 
            'alert-type' => 'success' ); 
            return Redirect::to('employe')->with($notification);
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
         $admin = User::find($id);
        if($admin->status==0)
        {
        $admin->status=1;

        $notification = array(
            'message' => 'Your expansive_category is Unblocked', 
            'alert-type' => 'success');
              }
              
              else
                { 
                     $admin->status=0;
                     $notification = array(
            'message' => 'Your expansive_category is Unblocked', 
            'alert-type' => 'error');
              }
              

        $admin->updated_at=new \DateTime();
        $admin->save();

        return Redirect::to('employe')->with($notification);//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User ::find($id);
      return View::make('admin.employe.edit')->with('admin',$admin) ; ////
    }


 public function password($id)
    {
      $admin = User ::find($id);
      return View::make('admin.employe.password')->with('admin',$admin) ; ////
    }

    public function password_update(Request $request, $id)
    {
              
 $this->validate($request,
       
        [
            'password' => 'required|string|min:6|confirmed',

        ]); 
            $admin = User ::find($id);           
            $admin->password=bcrypt($request->input('password'));  
            $admin->updated_at= new \DateTime();
            $admin->save();
            $notification = array(
            'message' => 'Your Password changed', 
            'alert-type' => 'success');
            return Redirect::to('employe')->with($notification);  

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
            'name' => 'required|string|max:255',
            'phone' => 'unique:users,phone,'.$id
          
 
        ],
        [
            'name.required'=>"Enter your Name",
          

            ]); 




            $admin = User ::find($id);           
            $admin->name=$request->input('name');
            $admin->phone=$request->input('phone');
            $admin->updated_at= new \DateTime();
            $admin->save();
            $notification = array(
            'message' => 'Your date is updated', 
            'alert-type' => 'success');
            return Redirect::to('employe')->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $admin = User ::find($id);
            $admin->deleted_on_off= 0;
            $admin->deleted_at= new \DateTime();
            $admin->save();

             $route=route::where('user_id', $id)->first();
              $route->user_id=0;
              $route->updated_at= new \DateTime();
              $route->save();

                $notification = array(
            'message' => 'Your date is Deleted', 
            'alert-type' => 'success');
            return Redirect::to('employe')->with($notification);  //
    }
}
