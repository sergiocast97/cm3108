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
        <div class="task_list" id="todo" name="To Do">
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
            </div>
        </div>

        <!-- In Progress -->
        <div class="task_list" id="in_progress" name="In Progress">
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
            </div>
        </div>

        <!-- Complete -->
        <div class="task_list" id="complete" name="Complete">
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

    <div id="event-btns">
        <button class="add-button edit-event button" data-toggle="modal" data-target="#edit-modal">Edit Event</button>
        <button class="add-button delete-event button" data-toggle="modal" data-target="#delete-event-modal">Delete Event</button>        
    </div>
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
                <input type="hidden" id="info-task-id">
                <div class="assign">
                    <img src="{{ URL::asset('img/user.jpg') }}" alt="Profile Picture" class="user-img">
                    <p>River Dee</p>
                </div>
                <p class="modal-task-summary">Task summary, these are words, explaining the task. Written as a large or small paragraph. On the left side of the modal.</p>
            </div>
            <button class="add-button delete-task button" data-toggle="modal" data-target="#delete-modal">Delete Task</button>
        </div>
        <div id="panel-comment">
            <div class="panel-content">
                <h5>Comments</h5>
                <div class="comment-section">
                    
                </div>
                
                <div class="form-group">
                    <textarea class="textbox" id="comment-msg" placeholder="Comment here..."></textarea>
                </div>
                <button class="comment-btn">Comment</button>
                
            </div>
        </div>
    </div>
</div>

<!-- END TASK MODAL -->

<div id="delete-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Delete Task</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this task?</p>
                <input id="delete-id" type="hidden">
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-dismiss="modal">Cancel</button>
                <button id="delete-submit" type="button" class="button" data-dismiss="modal">Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- EVENT MODAL -->
<div id="edit-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Event</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
                <!-- Add Task Form -->
                <form id="edit-event-form" class="info-form" method="POST">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <div class="form-group">
                        <input class="textbox" id="form-event-title" type="text" name="title" value="{{ $event->title }}">
                    </div>

                    <div class="form-group half">
                        <input class="textbox" type="text" name="location" id="form-event-location" value="{{ $event->location }}">
                        <input class="textbox" type="text" readonly="readonly" name="date" id="form-event-date" value="{{ $event->date }}">
                    </div>

                    <div class="form-group">
                        <textarea class="textbox" id="form-event-desc" name="description" rows="3" placeholder="Description">{{ $event->description }}</textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-dismiss="modal">Close</button>
                <button id="edit-event-submit" class="button" data-dismiss="modal">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- EVENT MODAL END -->

<div id="delete-event-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Delete Task</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this event?</p>
                    <input id="event-delete-id" type="hidden" value="{{ $event->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="button" data-dismiss="modal">Cancel</button>
                    <button id="delete-event-submit" type="button" class="button" data-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>


</main>
@endsection
