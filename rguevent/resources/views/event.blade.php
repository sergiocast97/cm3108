@extends('layouts.app')

@section('content')

<script>
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}
</script>

<!-- Event Tasks -->
<div class="task_area">

    <h2 class="task_area_title">Tasks</h2>

    <div class="task_lists">

        <!-- To Do -->
        <div class="task_list" id="todo">
            <h4 class="task_header">To Do</h4>
            <div class="task_column" ondrop="drop(event)" ondragover="allowDrop(event)">
                <div class="task_item" id="item1" draggable="true" ondragstart="drag(event)">Book conference room</div>
                <div class="task_item" id="item2" draggable="true" ondragstart="drag(event)">Contact sponsors</div>
                <div class="task_item" id="item3" draggable="true" ondragstart="drag(event)">Develop a promo video</div>
                <div class="task_item" id="item4" draggable="true" ondragstart="drag(event)">Order food and beverages</div>
            </div>
        </div>

        <!-- In Progress -->
        <div class="task_list" id="in_progress">
            <h4 class="task_header">In Progress</h4>
            <div class="task_column" ondrop="drop(event)" ondragover="allowDrop(event)">
                <div class="task_item" id="item5" draggable="true" ondragstart="drag(event)">Create Facebook event</div>
                <div class="task_item" id="item6" draggable="true" ondragstart="drag(event)">Reach out to speakers</div>
            </div>
        </div>

        <!-- Complete -->
        <div class="task_list" id="complete">
            <h4 class="task_header">Complete</h4>
            <div class="task_column" ondrop="drop(event)" ondragover="allowDrop(event)">
                <div class="task_item" id="item7" draggable="true" ondragstart="drag(event)">Recruit event committee</div>
                <div class="task_item" id="item8" draggable="true" ondragstart="drag(event)">Create event budget</div>
            </div>
        </div>

    </div>

</div>

<!-- Event info sidebar -->
<div class="event_info">

    <h3 class="event_name">Event Name</h3>

    <div class="event_head">
        <div class="single_location">
            <img src="{{ URL::asset('img/location.svg') }}" class="event_icon" alt="location">
            <span>Sir Ian Wood</span>
        </div>
        <div class="single_time">
            <img src="{{ URL::asset('img/time.svg') }}" class="event_icon" alt="clock">
            <span>10am - 3pm</span>
        </div>
    </div>

    <!-- Event Desctiption and Participants -->
    <div class="event_summary">Open day session for incoming and potential students</div>

    <div class="event_description">Our Open Days are an opportunity to start an educational journey which not only provides you with detailed  subject knowledge but also to become a skilled, capable graduate who is prepared for the world of work.</div>
    
    <div class="event_participants">
        <div class="participants_title">Participants</div>
        <ul>
            <li>Michael Ellis</li>
            <li>Boaty McBoatface</li>
            <li>Henry Wensleydale</li>
        </ul>
    </div>

</div>

</main>

<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}
</script>

@endsection
