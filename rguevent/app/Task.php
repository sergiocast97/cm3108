<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //

    // has one event
    public function event() {
        return $this->belongsTo('App\Event','event_id');
    }
    
    // has one assignee
    public function assignee() {
        return $this->belongsTo('App\User','assignee_id');
    }

    // has many comments
    public function comments() {
        return $this->hasMany('App\Comment','task_id');
    }
}
