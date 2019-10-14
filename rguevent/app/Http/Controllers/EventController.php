<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Event;
use App\User;

class EventController extends Controller
{
    public function events() {
        $userid = Auth::id();

        $user = User::find($userid);

        // dd($user);

        // get all authenticated user events
        $events = $user->events()->get();

        // dd($events);

        return view('event', ['events' => $events]);

    }
}
