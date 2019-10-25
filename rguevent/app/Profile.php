<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    // Get user for profile
    public function student() {
        return $this->belongsTo('App\User','student_id');
    }

    public function skills() {
        return $this->belongsToMany('App\Skill','userskills','user_id','skill_id');
    }
}
