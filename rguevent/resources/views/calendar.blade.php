@extends('layouts.app')
@section('content')

<!-- Calendar area -->
<div class="main_area calendar_area">

    <!-- Calendar -->
    <div class="calendar">
        
        <div class="calendar-tools">
            <div id="back-btn">
                <button id="change-back">&lt;</button>
            </div>
            <div id="calendar-current">
                <input name="month-list" id="month-list" class='date-picker' readonly="readonly">
                <!-- <span id="display-month"></span>
                <span id="display-year"></span> -->
            </div>
            <div id="forward-btn">
                <button id="change-forward">&gt;</button>
            </div>
        </div>
        
        <!-- Monthly Calendar -->
        <table id="cal-month">
        </table>

    </div>

</div>

<!-- Events Area -->
<div class="side">

    <div class="side_title" id="selected-date">Today</div>

    <!-- Event List -->
    <div class="events_list">

        <p id="no-events">No Events</p>

    </div>

    <button class="add-button add-event">Add Event</button>

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
            <img src="{{ URL::asset('img/time_black.svg') }}" class="event_icon" alt="clock" style="display:none;">
            <span></span>
        </div>
        <div class="single_location">
            <img src="{{ URL::asset('img/location_black.svg') }}" class="event_icon" alt="location">
            <span></span>
        </div>
    </div>

</div>

@endsection