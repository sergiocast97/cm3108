<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Calendar</title>

    <!-- Styling -->
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/calendar-style.css') }}">

</head>
<body>

    <nav>

        <!-- Current view -->
        <div class="page_title">Calendar</div>

        <!-- User header area -->
        <div class="user_header">
            <div class="user_name">River Dee</div>
            <div class="user_profile">
                <img src="{{ URL::asset('img/user.jpg') }}" alt="Profile Picture" class="user_picture">
                <div class="user_notification">3</div>
            </div>
        </div>

    </nav>

    <main>

        

        <!-- Calendar area -->
        <div class="calendar_area">

            <div class="calendar-tools">
                <div id="back-btn">
                    <button id="change-back">&lt;</button>
                </div>
                <div id="calendar-current">
                    <span id="display-month"></span>
                    <span id="display-year"></span>
                </div>
                <div id="forward-btn">
                    <button id="change-forward">&gt;</button>
                </div>
            </div>

            <!-- Calendar -->
            <div class="calendar">
                <!-- Calendar stuff will go here -->

                <!-- Monthly Calendar -->
                <table id="cal-month">
                </table>

            </div>

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
                <div class="button view_button">View</div>
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
        
    </main>

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Script for Calendar -->
    <script src="{{ URL::asset('js/calendar.js') }}"></script>

    <!-- Animation Script for Event Panel -->
    <script src="{{ URL::asset('js/animations.js') }}"></script>

</body>
</html>