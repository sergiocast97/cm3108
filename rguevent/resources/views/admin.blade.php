@extends('layouts.app')
@section('content')

<!-- Calendar area -->
<div class="user_area">

    <p>Admin Page</p>
    <p>{{ $user }}</p>

</div>

<!-- Events Area -->
<div class="events_area">

    <div class="events_day" id="selected-date">Today</div>

    <!-- Event List -->
    <div class="events_list">

        <p id="no-events">No Events</p>

    </div>

</div>

<!-- Single event -->
<div class="events_single" style="display:none;">

    <div class="single_header">
        <div class="single_title"></div>
        <form method="POST" action="{{ url('/event') }}">
            @csrf
            <input name="event_id" type="hidden">
            <button class="button view_button">View</button>
        </form>
    </div>

    <div class="single_description"></div>

    <div class="single_footer">
        <div class="single_time">
            <img src="{{ URL::asset('img/time.svg') }}" class="event_icon" alt="clock">
            <span></span>
        </div>
        <div class="single_location">
            <img src="{{ URL::asset('img/location.svg') }}" class="event_icon" alt="location">
            <span></span>
        </div>
    </div>

</div>

@endsection