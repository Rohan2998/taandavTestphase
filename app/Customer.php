<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function skills(){
        return $this->hasMany('App\Skill');
    }

    public function advertisements(){
        return $this->hasMany('App\Advertisement');
    }
}
