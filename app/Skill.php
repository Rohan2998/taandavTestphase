<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function customers(){
        return $this->hasMany('App\Customer','id','customer_id');
    }
}
