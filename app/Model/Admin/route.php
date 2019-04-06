<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class route extends Model
{
   protected $primaryKey = 'route_id';


    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }

     public function stores_route()
    {
        return $this->hasMany('App\Model\Admin\store','route_id');
    }



  public function reading_route()
    {
    	return $this->hasMany('App\Model\Admin\Reading','route_id');
    }



  public function expan_route()
    {
        return $this->hasMany('App\Model\Admin\expanses','route_id');
    }



}
