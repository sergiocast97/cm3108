<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    // has one author
    public function author() {
        return $this->belongsTo('App\User','author_id');
    }

    // has one task
    public function task() {
        return $this->belongsTo('App\Task','task_id');
    }
}
