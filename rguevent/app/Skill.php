<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //

    
    public function profile() {
        return $this->belongsToMany('App\Profile','userskills','skill_id','profile_id');
    }
    
}
