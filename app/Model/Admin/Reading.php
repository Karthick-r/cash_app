<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    protected $primaryKey = 'reading_id';


   public function reading_route1()
    {
        return $this->belongsTo('App\Model\Admin\route','route_id');
    }
     
       public function reading_store1()
    {
        return $this->belongsTo('App\Model\Admin\store','store_id');
    }
     
       public function reading_user1()
    {
        return $this->belongsTo('App\User','user_id');
    }


}
