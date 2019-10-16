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

    public function calendar() {

        // $events = Event::where('date',date("Y-m-d"))->get();

        return view('calendar');
    }

    public function getdates(Request $request) {

        $start_date =  $request->year."-".$request->month."-01";
        $end_date = $request->year."-".$request->month."-".$request->lastday;

        $event_dates = Event::select('date')->distinct()->whereBetween('date',[$start_date,$end_date])->get();

        // dd($event_dates);

        return $event_dates;
    }

    public function geteventinfo(Request $request) {
        $events = Event::where('date', '=', $request->date)->get();
        // dd($events);
        return $events;
    }

}
