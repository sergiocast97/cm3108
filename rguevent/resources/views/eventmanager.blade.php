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
            <!-- Menu button -->
            <span style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776;</span>

            <!-- Navigation bar title -->
            <div class="page_title" id="title">Calendar</div>

            <!-- User header area -->
            <div class="user_header">
                <div class="user_name">River Dee</div>
                <div class="user_profile">
                    <img src="{{ URL::asset('img/user.jpg') }}" alt="Profile Picture" class="user_picture">
                    <div class="user_notification">3</div>
                </div>
            </div>
        </nav>

        <!-- Menu items -->
        <div id="side_nav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="{{ url('/calendar') }}" target="iframe" onclick="setTitle('Calendar')">Calendar</a>
            <a href="{{ url('/event') }}" target="iframe" onclick="setTitle('Events Manager')">Events Manager</a>
        </div>
    <main>
        <!-- Use iFrame as a content window to load other pages into -->
        <iframe name="iframe" src="{{ url('/calendar') }}" height="100%" width="100%"></iframe>
    </main>
        <!-- JavaScript -->
        <script src="{{ URL::asset('js/navigation.js') }}"></script>
    </body>
</html>