<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Meta Information -->
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Styling -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/calendar-style.css') }}" rel="stylesheet">
    
</head>

<body>

    <nav>
        <!-- Menu button -->
        <span style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776;</span>

        <!-- Navigation bar title -->
        <div class="page_title" id="title">Event Manager</div>

        <!-- User Profile Notification -->
        <div class="user_profile">
            <img src="{{ URL::asset('img/user.jpg') }}" alt="Profile Picture" class="user_picture">
            <div class="user_notification">3</div>
        </div>
    </nav>

    <!-- Menu items -->
    <div id="side_nav" class="sidenav">
        <div class="closebtn" onclick="closeNav()"><img src="{{ asset('img/cross.svg') }}"></div>
        <a href="{{ url('/welcome') }}" >Welcome</a>
        <a href="{{ url('/calendar') }}" >Calendar</a>
        <a href="{{ url('/event') }}" >Events</a>
        <a href="{{ url('/user') }}" >User</a>
        <a href="{{ url('/admin') }}" >Admin</a>
    </div>

    <main>
        @yield('content')
    </main>

</body>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/navigation.js') }}"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
<script src="{{ asset('js/animations.js') }}"></script>

</html>
