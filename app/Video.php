<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $dates = [
        'converted_for_streaming_at',
    ];
 
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User','id','uploaded_by');
     }
}
