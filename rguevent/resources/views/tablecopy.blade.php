@extends('layouts.table')
@section('content')

<div class="main_area">
<div id="table-area">
<table id="bigtable">
    <thead>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Location</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Priority</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($events as $event)
    <tr>
        <td>{{ $event->title }}</td>
        <td>{{ $event->date }}</td>
        <td>{{ $event->location }}</td>
        <td>{{ $event->start_time }}</td>
        <td>{{ $event->end_time }}</td>
        <td>
        @if ($event->priority == 1)
            <img src="{{ asset('img/star.svg') }}" style="width: 15px; display: block; margin-left: auto; margin-right: auto;">
        @endif            
        </td>        
    </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>

<div class="side">
</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('js/animations.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/navigation.js') }}"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
<script src="{{ asset('js/modals.js') }}"></script>
<script src="{{ asset('js/tables.js') }}"></script>

@endsection