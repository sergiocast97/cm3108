<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar</title>

    <!-- Styling -->
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

</head>
<body>

    <nav>

        <!-- Current view -->
        <div class="page_title">Calendar</div>

        <!-- User header area -->
        <div class="user_header">
            <div class="user_name">Michael Ellis</div>
            <div class="user_profile">
                <img src="src/img/user.jpg" alt="Profile Picture" class="user_picture">
                <div class="user_notification">3</div>
            </div>
        </div>

    </nav>

    <main>

        <!-- Calendar area -->
        <div class="calendar_area">

            <!-- Calendar -->
            <div class="calendar">
                <!-- Calendar stuff will go here -->
            </div>

        </div>

        <!-- Events Area -->
        <div class="events_area">

            <div class="events_day">Today</div>

            <!-- Event List -->
            <div class="events_list">

                <!-- Single event -->
                <div class="events_single">

                    <div class="single_header">
                        <div class="single_title">Open Day</div>
                        <div class="button view_button">View</div>
                    </div>

                    <div class="single_description">Open day for incoming and potential students</div>

                    <div class="single_footer">
                        <div class="single_time">
                            <img src="src/icon/time.svg" class="event_icon" alt="clock">
                            <span>10am - 3pm</span>
                        </div>
                        <div class="single_location">
                            <img src="src/icon/location.svg" class="event_icon" alt="location">
                            <span>Sir Ian Wood</span>
                        </div>
                    </div>

                </div>

                <div class="events_single">

                        <div class="single_header">
                            <div class="single_title">Robot Workshop</div>
                            <div class="button view_button">View</div>
                        </div>
    
                        <div class="single_description">Lego EV3 robots workshop</div>
    
                        <div class="single_footer">
                            <div class="single_time">
                                <img src="src/icon/time.svg" class="event_icon" alt="clock">
                                <span>11am - 1pm</span>
                            </div>
                            <div class="single_location">
                                <img src="src/icon/location.svg" class="event_icon" alt="location">
                                <span>N533</span>
                            </div>
                        </div>
    
                    </div>

            </div>

        </div>
    </main>

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="src/js/animations.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>