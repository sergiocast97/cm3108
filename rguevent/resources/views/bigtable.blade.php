@extends('layouts.app')
@section('content')



<div class="main_area">
<div id="tablearea" style="width:100%;">
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
                <img src="{{ asset('img/star.svg') }}" style="width: 15px;">
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

@endsection