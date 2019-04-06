<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class expanses extends Model
{
    public function ex_pan()
    {
        return $this->belongsTo('App\Model\Admin\expansive_category','cat_id');
    }



 public function route_expan()
    {
        return $this->belongsTo('App\Model\Admin\route','route_id');
    }
    //
   
}
