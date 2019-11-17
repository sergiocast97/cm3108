@extends('layouts.app')

@section('content')

<!-- Event Tasks -->
<div class="task_area">

    <div id="title-zone">
        <h2 class="task_area_title">Tasks</h2>
        <button class="add-button" data-toggle="modal" data-target="#task-modal">Add Task</button>
    </div>
    

    <div class="task_lists">

        <!-- To Do -->
        <div class="task_list" id="todo">
            <h4 class="task_header">To Do</h4>
            <div class="task_column" ondrop="drop(event, this)" ondragover="allowDrop(event)">
                @foreach ($tasks as $task)
                    @if ($task->status === "To Do")
                        <div class="task_item" id="{{ 'task-' . $task->id }}" draggable="true" ondragstart="drag(event)">
                            {{ $task->title }}
                            @if ($task->assignee_id == $user->id)
                            <span><img src="{{ asset('img/star.svg') }}"></span>
                            @endif
                        </div>
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
            <div class="task_column" ondrop="drop(event, this)" ondragover="allowDrop(event)">
                @foreach ($tasks as $task)
                    @if ($task->status === "In Progress")
                        <div class="task_item" id="{{ 'task-' . $task->id }}" draggable="true" ondragstart="drag(event)">
                            {{ $task->title }}
                            @if ($task->assignee_id == $user->id)
                            <span><img src="{{ asset('img/star.svg') }}"></span>
                            @endif
                        </div>
                    @endif
                @endforeach
                <!-- <div class="task_item" id="item5" draggable="true" ondragstart="drag(event)">Create Facebook event</div>
                <div class="task_item" id="item6" draggable="true" ondragstart="drag(event)">Reach out to speakers</div> -->
            </div>
        </div>

        <!-- Complete -->
        <div class="task_list" id="complete">
            <h4 class="task_header">Complete</h4>
            <div class="task_column" ondrop="drop(event, this)" ondragover="allowDrop(event)">
                @foreach ($tasks as $task)
                    @if ($task->status === "Complete")
                        <div class="task_item" id="{{ 'task-' . $task->id }}" draggable="true" ondragstart="drag(event)">
                            {{ $task->title }}
                            @if ($task->assignee_id == $user->id)
                            <span><img class="assign_star" src="{{ asset('img/star.svg') }}"></span>
                            @endif
                        </div>
                    @endif
                @endforeach
                <!-- <div class="task_item" id="item7" draggable="true" ondragstart="drag(event)">Recruit event committee</div>
                <div class="task_item" id="item8" draggable="true" ondragstart="drag(event)">Create event budget</div> -->
            </div>
        </div>

    </div>

</div>

<!-- Event info sidebar -->
<div class="side">

    <div class="side_title">{{ $event->title }}</div>

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

    <button class="add-button edit-event button">Edit Event</button>

</div>

<!-- MODAL -->

<div id="task-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Task</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
                <!-- Add Task Form -->
                <form id="task-form" class="info-form">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">

                    <div class="form-group">
                        <input class="textbox" id="form-task-title" type="text" name="title" placeholder="Title">
                    </div>                  

                    <div class="form-group">
                        <textarea class="textbox" id="form-task-desc" name="description" rows="3" placeholder="Description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-dismiss="modal">Close</button>
                <button id="task-submit" type="button" class="button" data-dismiss="modal">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- END MODAL -->


<!-- TASK MODAL -->

<div id="info-modal">
    <div class="modal-content">
        <div id="panel-info">
            <div class="panel-content">
                <h4 class="modal-task-title">Task Title</h4>
                <h5 class="modal-event-title">Event Title</h5>
                <div class="assign">
                    <img src="{{ URL::asset('img/user.jpg') }}" alt="Profile Picture" class="user-img">
                    <p>River Dee</p>
                </div>
                <p class="modal-task-summary">Task summary, these are words, explaining the task. Written as a large or small paragraph. On the left side of the modal.</p>
            </div>
        </div>
        <div id="panel-comment">
            <div class="panel-content">
                <h5>Comments</h5>
                <div class="comment-section">
                    
                </div>
                <form>
                    <div class="form-group">
                        <textarea class="textbox">Comment here...</textarea>
                    </div>
                    <button type="submit" class="comment-btn">Comment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- END TASK MODAL -->


</main>
@endsection
