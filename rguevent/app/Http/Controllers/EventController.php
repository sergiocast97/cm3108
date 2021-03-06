<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Redirect;

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

    public function admin_events() {
        $events = Event::all();

        return view('bigtable',['events' => $events]);
    }

    public function admin_events_two() {
        $events = Event::all();

        return view('tablecopy',['events' => $events]);
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

    

    public function event(Request $request) {
        // get event
        $id = $request->event_id;
        $event = Event::find($id);

        // get participants
        $staff = $event->staff()->select('name')->get();

        // get tasks
        $tasks = $event->tasks()->get();

        // dd($tasks);

        $user = Auth::user();

        // return view and data
        return view('event',['event' => $event, 'staff' => $staff, 'tasks' => $tasks, 'user' => $user]);
    }


    // Add Event
    public function add_event(Request $request) {

        // dd($request);

        $request->validate([
            'title' => 'required|max:191',
            'description' => 'max:255',
            'summary' => 'max:255',
            'date' => 'required|date', // cannot have date in the past
            'location' => 'max:191',
            'start_time' => 'date_format:H:i',
            'end_time' => 'date_format:H:i|after:start_time'
        ]);

        $admin = Auth::id();

        $event = new Event;

        $event->creator_id = $admin;
        $event->title = $request->title;
        $event->date = $request->date;

        if (!$request->description) {
            $event->description = $request->description;
        }

        if (!$request->summary) {
            $event->summary = $request->summary;
        }

        if (!$request->location) {
            $event->location = $request->location;
        }

        if (!$request->start_time) {
            $event->start_time = $request->start_time;
        }

        if (!$request->end_time) {
            $event->end_time = $request->end_time;
        }

        $event->save();

        // dd($event->date);

        return $event;
        

    }

    // Edit Event
    public function edit_event(Request $request) {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'title' => 'required|max:191',
            'description' => 'max:255',
            'summary' => 'max:255',
            'date' => 'required|date|after_or_equal:today', // cannot have date in the past
            'location' => 'max:191',
            'start_time' => 'date_format:H:i',
            'end_time' => 'date_format:H:i|after:start_time'
        ]);

        $event = Event::find($request->event_id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->location = $request->location;
        
        $event->save();

        return $event;

    }

    // Delete Event
    public function delete_event(Request $request) {

        $request->validate([
            'id' => 'required|exists:events,id'
        ]);

        $event = Event::find($request->id);

        $event->delete();

        return 'True';

    }

}
