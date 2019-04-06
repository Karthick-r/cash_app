<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\expansive_category;
use App\Model\Admin\expanses;
use App\Model\Admin\route;
use App\Model\Admin\Reading;
use DB;
use Validator;
class ExpanseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   

   


// $vv=DB::table('routes')
//             ->leftJoin('expanses', 'routes.route_id', '=', 'expanses.route_id')
//             ->select('routes.route_id','routes.route_name', DB::raw("(  select sum(expanses.amount) from expanses INNER join routes on expanses.route_id =routes.route_id GROUP BY expanses.route_id   ) as product_stock"))

//             ->get();

// $expanse=DB::SELECT('select routes.route_id ,routes.route_name,sum(expanses.amount) as amount from expanses inner JOIN routes on routes.route_id =expanses.route_id GROUP by expanses.route_id');



            // $vv1=DB::table('expanses')
            // ->Join('routes', 'routes.route_id', '=', 'expanses.route_id')
            // ->select('routes.route_id','routes.route_name', DB::raw("(  select sum(expanses.amount) from expanses inner JOIN routes on expanses.route_id =routes.route_id GROUP BY expanses.cat_id   ) as product_stock"))

            // ->get();


// $data = DB::table("routes")
//           ->join('expanses', 'routes.route_id', '=', 'expanses.route_id')
//           ->select('routes.route_id','routes.route_name',
//                     DB::raw("(SELECT SUM(expanses.amount) FROM expanses
//                                 WHERE expanses.route_id = routes.route_id
//                                 GROUP BY expanses.route_id) as product_stock"))
//           ->get();

 // $expanses = DB::table('expanses')
         
 //           ->join('expansive_categories', 'expansive_categories.categories_id', '=', 'expanses.cat_id')
           
           
 //        ->select('expanses.*', 'expansive_categories.categories_name as category')
 //           ->get();



// $vv1=DB::table('expanses')
//         ->select('routes.route_id', 'expanses.*')

//         ->join(DB::raw('(SELECT * FROM `expanses` GROUP BY route_id)
//                routes'), 
//         function($join)
//         {
//            $join->on('routes.route_id', '=', 'expanses.route_id');
//         })
       
//         ->get();


//         $users = route ::select(\DB::raw('routes.*, SUM(expanses.amount) as revenue'))
//          ->leftJoin('expanses',  'routes.route_id', '=', 'expanses.route_id')
//          ->groupBy('routes.route_id')
//          ->get();


// 


//   $totalRevenue = DB::table('partner_revenues')
//             ->select('lp_users.email', DB::raw('SUM(revenue) as total'))
//             ->join('lp_users', 'partner_revenues.user_id', '=', 'lp_users.id')
//             ->join('partners', 'partner_revenues.partner_id', '=', 'partners.id')
//             ->join('pocs', 'partner_revenues.poc_id', '=', 'pocs.id')
//             ->groupBy('partner_revenues.user_id')
//             ->paginate(15);

            //   $totalRevenue = DB::table('expanses')
            // ->select('routes.route_id', DB::raw('SUM(amount) as total'))
            // ->join('routes', 'routes.route_id', '=', 'expanses.route_id')
            
            // ->groupBy('expanses.route_id')
            
            // ->paginate(15);


// $expanses = DB::table('expanses')
         
//            ->join('expansive_categories', 'expansive_categories.categories_id', '=', 'expanses.cat_id')
           
//            ->where(DB::raw("(DATE_FORMAT(expanses.created_at,'%d-%m-%Y'))"),date('d-m-Y'))
//         ->select('expanses.*', 'expansive_categories.categories_name as category')
//            ->get();

//             $categorys=expansive_category::where('deleted_on_off', '1')->where('status','1')->orderBy('categories_id', 'desc')->orderBy('created_at', 'DESC')->get();
//           // echo  $categorys->count();

  //return view('admin/expanse/index',['expanses'=>$expanses]);





$route=route::with(['expan_route' => function ($query) {
          $query->where(DB::raw("(DATE_FORMAT(expanses.created_at,'%d-%m-%Y'))"),date('d-m-Y'));

      }])
->where('deleted_on_off', '1')->orderBy('created_at', 'DESC')->get();


 $date= date('d F ,Y');

 $expanses=expanses::
 where(DB::raw("(DATE_FORMAT(expanses.created_at,'%d-%m-%Y'))"),date('d-m-Y'))->sum('amount');



return view('admin/expanse/index',['route'=>$route,'date'=>$date,'expanse'=>$expanses]);
// return response()->json([ 'status' => 'OK','sss'=>$route], 200);



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
      [
       'date' => 'required',   
      ]);

        if ($validator->fails())
         {

            $notification = array(
            'message' => 'Click Date to Filter.', 
            'alert-type' => 'warning' );      
             return redirect()->back()->withErrors($validator)->with($notification);
         }

         else
         {
           
           $date= $request->input('date');

           $time = strtotime($date);
           $newformat = date('d-m-Y',$time);

           $route=route::with(['expan_route' => function ($query) use($newformat)
           {




          $query->where(DB::raw("(DATE_FORMAT(expanses.created_at,'%d-%m-%Y'))"),$newformat);

      }])->where('deleted_on_off', '1')->orderBy('created_at', 'DESC')->get();


 $expanses=expanses::
 where(DB::raw("(DATE_FORMAT(expanses.created_at,'%d-%m-%Y'))"),$newformat)->sum('amount');
return view('admin/expanse/index',['route'=>$route,'date'=>$date ,'expanse'=>$expanses]);



       
       
          }


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
       
$route=route::where('route_id', $id)->first();

$date=$request->input('date1');



$expanses = DB::table('expanses')
         
           ->join('expansive_categories', 'expansive_categories.categories_id', '=', 'expanses.cat_id')
       ->join('users', 'users.id', '=', 'expanses.user_id')
           ->where('expanses.route_id',$id)
           ->where(DB::raw("(DATE_FORMAT(expanses.created_at,'%d-%m-%Y'))"),$date)
        ->select('expanses.*', 'expansive_categories.categories_name as category','users.name as emple')
           ->get();



return view('admin/expanse/details',['expanses'=>$expanses,'route'=>$route]);



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
      
$route=route::where('route_id', $id)->first();


$date=$request->input('date1');


           $newformat = date('d-m-Y',strtotime($date));

//echo $newformat;

$expanses = DB::table('expanses')
         
           ->join('expansive_categories', 'expansive_categories.categories_id', '=', 'expanses.cat_id')
       ->join('users', 'users.id', '=', 'expanses.user_id')
           ->where('expanses.route_id',$id)
           ->where(DB::raw("(DATE_FORMAT(expanses.created_at,'%d-%m-%Y'))"),$newformat)
        ->select('expanses.*', 'expansive_categories.categories_name as category','users.name as employee')
           ->get();
// print_R($date);
// print_r($expanses);

            $amount=expanses::
 where(DB::raw("(DATE_FORMAT(expanses.created_at,'%d-%m-%Y'))"),$newformat)
  ->where('route_id',$id)->sum('amount');

return view('admin/expanse/details',['expanses'=>$expanses,'route'=>$route ,'date'=>$newformat ,'amount'=>$amount]);

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
