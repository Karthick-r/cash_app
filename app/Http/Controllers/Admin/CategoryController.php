<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Redirect;
use App\Model\Admin\expansive_category;
use Illuminate\Support\Facades\View;
use Validator;



class CategoryController extends Controller
{
  
        public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {
       $categorys=expansive_category::where('deleted_on_off', '1')->orderBy('categories_id', 'desc')->orderBy('created_at', 'DESC')->get();
    return view('admin/category/index',['categorys'=>$categorys]);

    }

    public function create()
    {
        return view('admin/category/create');//
    }

   
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), 
      [
       'name' => 'required|string|max:255|unique:expansive_categories,categories_name',   
      ]);

        if ($validator->fails())
         {

            $notification = array(
            'message' => 'your data error.', 
            'alert-type' => 'warning' );      
             return redirect()->back()->withErrors($validator)->with($notification);
         }

         else
         {
            $category = new expansive_category;
            $category->categories_name = $request->input('name');
            $category->save();
            $notification = array(
            'message' => 'your data is inserted.', 
            'alert-type' => 'success');
            return redirect()->back()->with($notification);
          }

    }
    

    public function show($id)
    {
        $category = expansive_category::find($id);
       
        if($category->status==0)
        {
        $category->status=1;
         $notification = array(
            'message' => 'Your expansive_category is Unblocked', 
            'alert-type' => 'success');
              }
              else
                {      $category->status=0;
                     $notification = array(
            'message' => 'Your expansive_category is blocked', 
            'alert-type' => 'error');
              }

        $category->updated_at=new \DateTime();
        $category->save();



        return Redirect::to('expensive_category')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $category = expansive_category::find($id);
        return View::make('admin.category.edit')->with('category',$category) ;////
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
            'name' => 'required',
           ],

           [
            'name.required'=>"Enter your category Name",
           ]); //

            $category = expansive_category::find($id);
            $category->categories_name = $request->input('name');
            $category->updated_at=new \DateTime();
            $category->save();
             $notification = array(
            'message' => 'Your Date is Updated', 
            'alert-type' => 'success');
            return Redirect::to('expensive_category')->with($notification); // //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = expansive_category::find($id);
        $category->deleted_on_off=0;
        $category->deleted_at=new \DateTime();
        $category->save();
        $notification = array(
            'message' => 'Your expansive_category is Deleted', 
            'alert-type' => 'warning');
        return Redirect::to('expensive_category')->with($notification); //
    }

    
}
