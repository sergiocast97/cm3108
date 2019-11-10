<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

<div class="main_area">
<div id="table-area" style="width: 75%;">
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