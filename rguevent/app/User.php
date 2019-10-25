<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // has many events
    public function events() {
        return $this->belongsToMany('App\Event','eventstaff','user_id','event_id')->withTimestamps();
    }

    // has many tasks
    public function tasks() {
        // return all assigned tasks
        return $this->hasMany('App\Task','assignee_id');
    }

    public function profile() {
        return $this->hasOne('App\Profile','user_id')
    }
}
