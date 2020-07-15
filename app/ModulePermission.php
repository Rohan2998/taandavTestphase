<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ModulePermission extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'upload_feed', 'upload_art', 'approve_ads', 'toggle_user_info', 'add_admin', 'remove_admin',
    ];

    public function users(){
        return $this->hasMany('App\User','id','user_id');
    }
}
