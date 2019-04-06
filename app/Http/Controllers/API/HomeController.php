<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Profile;
use Auth;
use Carbon\Carbon;

use Session;

use App\ChangePoints;
use DB;
use Illuminate\Support\Facades\Input;


use App\Scoresheet;
use App\Players;

use App\Tournament;
use Response;
use App\Team;
use App\Organize;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $val = Organize::all()->count();
        $play = Players::all()->count();
        $tour = Tournament::all()->count();
        $team = Team::all()->count();

        
        return view('home')->with('val', $val)->with('play', $play)->with('tour', $tour)->with('team', $team);
    }



public function dateshow(Request $request, $matchdate){
    $match = Organize::where('matchdate', $matchdate)->get();
    $matcha = Organize::where('matchdate','!=', $matchdate)->get();


    $data = array();
    $datas = array();

    foreach($match as $mas){
        $data[] = [
            "match_id" => $mas->id,
            "status" => 0,
               "teamname"        =>  $mas->oppo,
    
    "country" => $mas->country,
    
    "state" => $mas->state,
    
    "city" => $mas->city,
    "owner_id" => $mas->user_id,
        ];
    }


foreach($matcha as $fas){
    $datas[] = [
        "match_id" => $fas->id,
           "teamname"        =>  $fas->oppo,

"country" => $fas->country,

"state" => $fas->state,

"city" => $fas->city,
"owner_id" => $fas->user_id,
"status" => 1
    ];
}

return response()->json([
    "teams" => $data, $datas

]);


}


    public function detail(){


        $user = User::find($id)->first()->profile()->first();




        return response()->json(array('success' => [
            "id" => $user->id,
            'Batsman' =>  $user->batsman,
            'bowler' => $user->bowler,
            'about' => $user->about,
            'wk' => $user->wicketkeeper,
            'allrounder' => $user->allrounder
                    ]));



 


    }


    public function data(){
        $team = Team::all();
        return response()->json((array('Success' => $team)));

        
        
          





 


    }


    public function tour(){
  

        $team = Tournament::all();

        return Response::json(array('success' => $team));





}
    public function dashboard(){


        $valid = Carbon::now();

        $sheet = Scoresheet::where('live', '=', 1 )->take(5)->get();
$data = Organize::where('matchdate', '>', $valid)->take(4)->get();
$tour = Tournament::where('created_at', '>', $valid)->take(4)->get();
$scoresheet = array();


$org = array();

$tours = array();

foreach($sheet as $sheets){

    $scoresheet[] = [
        "id" => $sheets->id,
        "team1" => $sheets->team1,
        "team2" => $sheets->team2,
        "t1score" => $sheets->t1score,
        "t2team1" => $sheets->t2team1,
        "t1overs" => $sheets->t1overs,
        "t2overs" => $sheets->t2overs,
        "city" => $sheets->city,
        "city" => $sheets->city,

        
    ];

}

foreach($data as $orgs){
    $org[] = [

        "id" => $orgs->id,
        "team1" => $orgs->whovswho,
        "team2" => $orgs->oppo,
        "venue" => $orgs->venue,
        "date" => reset($orgs->created_at)
        
    ];






}

foreach($tour as $gain){
    $tours[] = [

        "id" => $gain->id,
        "name" => $gain->tourtype,
        "date" => $gain->created_at,
        "venue" => $gain->venue,
        "date" => reset($gain->created_at),
    ];
}



return response()->json([
    "live matches" => 
       $scoresheet
    ,

    "featured matches" => 
        $org
    ,
    "featured tournaments" =>
        $tours
    

]);



}


public function showusers(){

    $user = User::all();

$users = array();


foreach($user as $us){
    $users[] = [
        'id' => $us->id,
        'name' => $us->fname . $us->lname,
        'avatar' => $us->avatar

    ];
}

    return response()->json(
        $users
        
    );



}

public function checknum(){

$data = Input::get('email');
    if(User::where('phone', '=', Input::get('phone'))->count() > 0) {

         return response()->json([

             'Result' => 'Mobile number already exists'
         
             ]);

    }



else if(User::where('email', Input::get('email'))->exists() && $data  !== NULL ){



 return response()->json([

             'Result' => 'Email already exists'

             ]);



}

}

public function allusers(){
    $user = User::where('role_id', '=', 1)->get();


    return view('userdata')->with('user', $user);
}


public function blocked($id){
    $user = User::find($id);



$user->role_id = 4;

$user->save();

Session::flash('success', 'User blocked');

return redirect()->back();
}
public function showpoints(){
    $change = ChangePoints::find(1);
    

    return view('pointsshow')->with('change', $change);
    
  
    }

public function changenumber(Request $request){

$change = ChangePoints::find(1);

$change->points = $request->points;
$change->rewards = $request->rewards;

$change->save();

Session::flash('success', 'Reward points changed');

return redirect()->back();
}



public function showmat(){
    $team = Team::all();

    return view('showmat')->with('team', $team);
}

public function showtournaments(){
    $tour = Tournament::all();

    return view('showtr')->with('tour', $tour);
}
public function showresults(){
    $org = Organize::all();

    return view('showorg')->with('org', $org);
}


public function vwpro($id){

    $prof = Profile::where('user_id' ,$id)->first();

    return view('vwprof')->with('prof', $prof);



}


public function upcoming(){
    $data = Carbon::now();
    $upcmng = Organize::where('matchdate', '>', $data)->get();

    return view('upcmng')->with('upcmng', $upcmng);



}

public function makelive($id){
    $match = Organize::find($id);

    $match->live = 1;

    $match->save();
$matchid = $match->id;
$matchteams = Team::where('id', $match->whovswho)->first();
$matchoppo = Team::where('id', $match->oppo)->first();


$plays  = Players::where('id', $match->whovswho)->get();
$playrs  = Players::where('id', $match->oppo)->get();


$players = array();

$players2 = array();

foreach($plays as $matches){
    $players[] = [
     'id' => $matches->id,

        'name' => $matches->players,
    ];
    
}

foreach($playrs as $matchs){
    $players2[] = [
     'id' => $matchs->id,
        'name' => $matchs->players,
    ];
    
}

    return response()->json([


        'id' => $matchid,
         'success' =>[
           'match_date' => $match->matchdate,
        'Team 1 name'  => $matchteams->teamname,
        
    
        "Team 2 name" => $match->teamname,

        'Team 1 players' =>  $players
        ,
        'Team 2 players' => $playrs,
        
        ]
    ]);
}

public function addplayer(Request $request,$id){
       DB::table('players_team')->insert(
        array('team_id' => $request->id,
              'players_id' => $request->players_id,
           )
    );

    return response()->json([
    'Success' => 'player added successfully'
    ]);
}


public function load($id){

   
    $player = Team::find($id);
$data = Team::find($id)->players;
    $output = array();







  

return response()->json([
  "id" => $id,
  "Team name" => $player->teamname,
    "Players" =>[
           $data->players

    ]
]);




}


public function seebusy(Request $request,$matchdate, $oppo){
  
if( Organize::where('matchdate', $matchdate)->where('oppo', '=', $oppo)->exists() || Organize::where('matchdate', $matchdate)->where('whovswho', '=', $oppo)->exists() )
{



 return response()->json([
         "Failed" => "team is busy"
   ]);

}


else {


 return response()->json([
         "Success" => "Team is available"
   ]);


}




}

public function showdetailmat(){

    $val = Carbon::now();
    
    
    
    $datas = Organize::where('matchdate', '>', $val)->get();
    
    $datasr = Organize::where('live', '=', 1)->get();
    $datasrc = Organize::where('matchdate', '<', $val)->get();
      

    
    $vals = array();
    
    
    $lv = array();
    $lsv = array();
    
    
    foreach($datas as $asv){
    
        $vals[] = [
    
    
            "matchId" => $asv->id,
            "team1 id" => $asv->whovswho,
            "team2 id" => $asv->oppo,
       "team1 name" => Team::where('id' , '=', $asv->whovswho)->first()->teamname,
              "team2 name" => Team::where('id' , '=', $asv->oppo)->first()->teamname,
              "date" => $asv->matchdate,
            "venue" => $asv->country. " " . $asv->state . " " . $asv->city
    





    ];
}

foreach($datasr as $lvs){

    $lv[] =
    
    
    [

        "matchId" => $lvs->id,
        "team1 id" => $lvs->whovswho,
        "team2 id" => $lvs->oppo,
         "team1 name" => Team::where('id' , '=', $lvs->whovswho)->first()->teamname,
         "team2 name" => Team::where('id' , '=', $lvs->oppo)->first()->teamname,
              "date" => $lvs->matchdate,

        "venue" => $lvs->country. " " . $lvs->state . " " . $lvs->city

    ];


}



foreach($datasrc as $lvsw){


    $lsv[] = [


        "matchId" => $lvsw->id,
        "team1 id" => $lvsw->whovswho,
        "team2 id" => $lvsw->oppo,
 "team1 name" => Team::where('id' , '=', $lvsw->whovswho)->first()->teamname,
         "team2 name" => Team::where('id' , '=', $lvsw->oppo)->first()->teamname,
            "date" => $lvsw->matchdate,

  "venue" => $lvsw->country . " " . $lvs->state . " " . $lvs->city






    ];


}

return response()->json([
    "Upcoming matches" => $vals,
    "live matches" => $lv,
    "completed matches" => $lsv

]);

}

public function mymat($id){
    $user = Organize::where('user_id', '=', Auth::user()->id)->where('matchdate', '>', Carbon::now())->get();

    $usesr = Organize::where('user_id', '=', Auth::user()->id)->where('live', '=', 1)->get();
    $usebr = Organize::where('user_id', '=', Auth::user()->id)->where('matchdate', '<', Carbon::now())->get();

    $lsv = array();

    $lsvw = array();
    $lssv = array();


foreach($user as $lvsw){


    $lsv[] = [


        "matchId" => $lvsw->id,
         "team1 id" => $lvsw->whovswho,
        "team2 id" => $lvsw->oppo,
         "team1 name" => Team::where('id' , '=', $lvsw->whovswho)->first()->teamname,
         "team2 name" => Team::where('id' , '=', $lvsw->oppo)->first()->teamname,
          "date" => $lvsw->matchdate,


        "venue" => $lvsw->country . " " . $lvsw->state . " " . $lvsw->city






    ];


}
foreach($usebr as $sd){


    $lsvw[] = [


        "matchId" => $sd->id,
         "team1 id" => $sd->whovswho,
        "team2 id" => $sd->oppo,
         "team1 name" => Team::where('id' , '=', $sd->whovswho)->first()->teamname,
         "team2 name" => Team::where('id' , '=', $sd->oppo)->first()->teamname,
          "date" => $sd->matchdate,
        "venue" => $sd->country . " " . $sd->state . " " . $sd->city






    ];

   
}

foreach($usesr as $asp){


    $lssv[] = [


        "matchId" => $asp->id,
         "team1 id" => $asp->whovswho,
        "team2 id" => $asp->oppo,
         "team1 name" => Team::where('id' , '=', $asp->whovswho)->first()->teamname,
         "team2 name" => Team::where('id' , '=', $asp->oppo)->first()->teamname,
          "date" => $asp->matchdate,


        "venue" => $asp->country . " " . $asp->state . " " . $asp->city






    ];


}


return response()->json([
    "Upcoming matches" => $lsv,
    "live matches" => $lssv,
    "completed matches" => $lsvw

]);

}





}




