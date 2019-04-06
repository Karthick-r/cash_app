<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Admin\price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Validator;
class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $price=price::orderBy('created_at', 'DESC')->first();
         return view('admin/price/index',['price'=>$price]); 
       
    }

     public function view()
    {
         $price=price::orderBy('created_at', 'DESC')->get();
         return view('admin/price/index1',['price'=>$price]); 
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin/price/create');   
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
      [    'name' => 'required',
           'name1' => 'required',
           
      ],
      [       'name.required'=>"Enter Bottle Price", 
              'name1.required'=>"Enter Water Price",   ]);



 if ($validator->fails())
         {

            $notification = array(
            'message' => 'your data error.', 
            'alert-type' => 'warning' );      
             return redirect()->back()->withErrors($validator)->with($notification)->withInput();
         }

 else
         {
      
          


            $price1 = new price;
            $price1->bottle_price=$request->input('name'); 
            $price1->water_price=$request->input('name1');     
            $price1->save();


            $notification = array(
            'message' => 'Your date is Insert', 
            'alert-type' => 'success');
            return Redirect::to('price')->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Admin\price  $price
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $price = price::find($id);
      return View::make('admin.price.edit')->with('price',$price) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin\price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

 $validator = Validator::make($request->all(), 
      [    'name' => 'required',
           'name1' => 'required',
           
      ],
      [       'name.required'=>"Enter Bottle Price", 
              'name1.required'=>"Enter Water Price",   ]);



 if ($validator->fails())
         {

            $notification = array(
            'message' => 'your data error.', 
            'alert-type' => 'warning' );      
             return redirect()->back()->withErrors($validator)->with($notification)->withInput();
         }

 else
         {
      
            $price = price::find($id);           
            $price->updated_at= new \DateTime();
            $price->save();


            $price1 = new price;
            $price1->bottle_price=$request->input('name'); 
            $price1->water_price=$request->input('name1');     
            $price1->save();


            $notification = array(
            'message' => 'Your date is updated', 
            'alert-type' => 'success');
            return Redirect::to('price')->with($notification);
        }


          

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(price $price)
    {
        //
    }
}
