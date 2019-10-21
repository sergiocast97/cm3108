<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event</title>

    <!-- Styling -->
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

</head>
<body>
    <main>

    <!-- Event Task area -->
    <div class="task_area">

        <!-- Tasks -->
        <div class="task">
            <!-- To do tasks-->
            <h4 class="task_header">To Do</h4>
            <ul class="taskList">
                <li>Book conference room</li>
                <li>Contact sponsors</li>
                <li>Develop a promo video</li>
                <li>Order food and beverages</li>
            </ul>
        </div>
        <div class="task">
            <h4 class="task_header">In Progress</h4>
            <!-- In progress tasks-->
            <ul class="taskList">
                <li>Create Facebook event</li>
                <li>Reach out to speakers</li>
            </ul>
        </div>
        <div class="task">
            <h4 class="task_header">Completed</h4>
            <!-- completed tasks-->
            <ul class="taskList">
                <li>Recruit event committee</li>
                <li>Create event budget</li>
            </ul>
        </div>
    </div>

        <!-- Events Area -->
        <div class="event_area">
            <h3 class="event_name">Event Name</h3>
            <div class="event_head">
                <div class="single_time">
                    <img src="{{ URL::asset('img/time.svg') }}" class="event_icon" alt="clock">
                    <span>10am - 3pm</span>
                </div>
                <div class="single_location">
                    <img src="{{ URL::asset('img/location.svg') }}" class="event_icon" alt="location">
                    <span>Sir Ian Wood</span>
                </div>
            </div>

            <!-- Event Desctiption and Participants -->
            <div class="event_description">
                 Open day for incoming and potential students
            </div>
            <div class="event_description">
                Our Open Days are an opportunity to start an educational journey which not only provides you with detailed 
                subject knowledge but also to become a skilled, capable graduate who is prepared for the world of work.
            </div>
            <div class="event_description">
                    Participants:
                    <ul>
                        <li>Michael Ellis</li>
                        <li>Boaty McBoatface</li>
                        <li>Henry Wensleydale</li>
                    </ul>
            </div>
        </div>

    </main>

    <!-- JS -->

</body>
</html>