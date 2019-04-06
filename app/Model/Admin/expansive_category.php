<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class expansive_category extends Model
{
   protected $primaryKey = 'categories_id'; 


     public function ex_pan1()
    {
    	return $this->hasMany('App\Model\Admin\expanses','cat_id');
    }

}
