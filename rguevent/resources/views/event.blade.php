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
                @foreach ($tasks as $task)
                    @if ($task->status === "To Do")
                        <div class="task_item" id="{{ 'task-' . $task->id }}" draggable="true" ondragstart="drag(event)">{{ $task->title }}</div>
                    @endif
                @endforeach
                <!-- <div class="task_item" id="item1" draggable="true" ondragstart="drag(event)">Book conference room</div>
                <div class="task_item" id="item2" draggable="true" ondragstart="drag(event)">Contact sponsors</div>
                <div class="task_item" id="item3" draggable="true" ondragstart="drag(event)">Develop a promo video</div>
                <div class="task_item" id="item4" draggable="true" ondragstart="drag(event)">Order food and beverages</div> -->
            </div>
        </div>

        <!-- In Progress -->
        <div class="task_list" id="in_progress">
            <h4 class="task_header">In Progress</h4>
            <div class="task_column" ondrop="drop(event)" ondragover="allowDrop(event)">
                @foreach ($tasks as $task)
                    @if ($task->status === "In Progress")
                        <div class="task_item" id="{{ 'task-' . $task->id }}" draggable="true" ondragstart="drag(event)">{{ $task->title }}</div>
                    @endif
                @endforeach
                <!-- <div class="task_item" id="item5" draggable="true" ondragstart="drag(event)">Create Facebook event</div>
                <div class="task_item" id="item6" draggable="true" ondragstart="drag(event)">Reach out to speakers</div> -->
            </div>
        </div>

        <!-- Complete -->
        <div class="task_list" id="complete">
            <h4 class="task_header">Complete</h4>
            <div class="task_column" ondrop="drop(event)" ondragover="allowDrop(event)">
                @foreach ($tasks as $task)
                    @if ($task->status === "Complete")
                        <div class="task_item" id="{{ 'task-' . $task->id }}" draggable="true" ondragstart="drag(event)">{{ $task->title }}</div>
                    @endif
                @endforeach
                <!-- <div class="task_item" id="item7" draggable="true" ondragstart="drag(event)">Recruit event committee</div>
                <div class="task_item" id="item8" draggable="true" ondragstart="drag(event)">Create event budget</div> -->
            </div>
        </div>

    </div>

</div>

<!-- Event info sidebar -->
<div class="event_info">

    <h3 class="event_name">{{ $event->title }}</h3>

    <div class="event_head">
        <div class="single_location">
            <img src="{{ URL::asset('img/location.svg') }}" class="event_icon" alt="location">
            <span>{{ $event->location }}</span>
        </div>
        <div class="single_time">
            @if (!empty($event->start_time))
                <img src="{{ URL::asset('img/time.svg') }}" class="event_icon" alt="clock">
                <span>            
                {{ date("H:i", strtotime($event->start_time)) }}

                @if (!empty($event->end_time))
                    - {{ date("H:i", strtotime($event->end_time)) }}
                    </span>
                @else
                    </span> 
                @endif
            @endif
        </div>
    </div>

    <!-- Event Desctiption and Participants -->
    <div class="event_summary">{{ $event->summary }}</div>

    <div class="event_description">{{ $event->description }}</div>
    
    <div class="event_participants">
        <div class="participants_title">Participants</div>
        <!-- <ul>
            <li>Michael Ellis</li>
            <li>Boaty McBoatface</li>
            <li>Henry Wensleydale</li>
        </ul> -->
        <ul>
        @foreach ($staff as $s)
            <li>{{ $s->name }}</li>
        @endforeach
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
