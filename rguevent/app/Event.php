<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //

    // has one creator
    public function creator() {
        return $this->belongsTo('App\User','creator_id','id');
    }
    
    // has many staff
    public function staff() {
        return $this->belongsToMany('App\User','eventstaff','event_id','user_id')->withTimestamps();
    }

    // has many tasks
    public function tasks() {
        return $this->hasMany('App\Task','id','event_id');
    }
}
