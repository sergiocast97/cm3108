<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Profile;
use App\Event;

class UserController extends Controller
{
    public function user() {

        // get current user id
        $user = Auth::user();

        $access = $user->access;

        // get user tasks
        $tasks = $user->tasks()->get(); 

        // if admin
        if ($access === "admin") {
            // get all events
            $events = Event::all();

            return view('admin',['user' => $user,'events' => $events, 'tasks' => $tasks]);
        }
        else {
            // get user events
            $events = $user->events()->get();

            // student ambassador
            // get student profile
            if ($access === "ambassador") {
                $profile = $user->profile()->get();
                foreach ($profile as $p) {
                    $p_id = $p->id;
                    $profile = Profile::find($p_id);
                    $skills = $profile->skills()->get();
                }

                return view('admin', ['user' => $user,'events' => $events, 'tasks' => $tasks, 'profile' => $profile, 'skills' => $skills]);
            }

            return view('admin',['user' => $user,'events' => $events, 'tasks' => $tasks]);

        }               
    
    }
}
