<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class store extends Model
{
   protected $primaryKey = 'store_id';

 public function route_store()
    {
        return $this->belongsTo('App\Model\Admin\route','route_id');
    }
    //


  public function reading_store()
    {
    	return $this->hasMany('App\Model\Admin\Reading','store_id');
    }

}
