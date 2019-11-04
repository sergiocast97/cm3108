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

    <button class="add-button add-event" data-toggle="modal" data-target="#event-modal">Add Event</button>

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

<!-- MODAL -->

<div id="event-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Event</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
                <!-- Add Task Form -->
                <form id="event-form" class="info-form">
                    @csrf
                    <!-- <input type="hidden" name="event_id"> -->
                    <div class="form-group">
                        <label for="event-title">Event</label>
                        <input id="form-event-title" type="text" name="title" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label for="form-event-desc">Description</label>
                        <textarea id="form-event-desc" name="description" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="form-event-date">Date</label>
                        <input type="text" readonly="readonly" name="date" id="form-event-date">
                    </div>

                    <div class="form-group">
                        <label for="form-event-location">Location</label>
                        <input type="text" name="location" id="form-event-location">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="event-submit" type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- END MODAL -->

@endsection