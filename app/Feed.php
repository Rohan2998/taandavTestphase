<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Feed extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uploaded_by', 'title', 'description', 'link', 'img_name'
    ];


    public function user(){
        return $this->belongsTo('App\User','id','uploaded_by');
     }
}
