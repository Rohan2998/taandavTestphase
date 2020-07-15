<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    public function customer(){
        return $this->belongsTo('App\Customer','id','customer_id');
     }
}
