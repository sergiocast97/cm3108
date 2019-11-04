@extends('layouts.app')
@section('content')

<!-- Calendar area -->
<div class="main_area">

<script>/*
    <div class="user_summary">

        <!-- Picture -->
        <img src="{{ URL::asset('img/user.jpg') }}" alt="Profile Picture" class="picture">

        <div class="user_info">

            <div class="main_info">
                <div class="user_name">Michael Ellis</div>
                <div class="user_type">Admin</div>
            </div>

            <div class="contact_info">
                <div class="user_phone">+44 6381 317 611</div>
                <div class="user_email">m.ellis@rgu.ac.uk</div>
                <div class="user_gender">Male</div>
            </div>

        </div>

    </div>
*/</script>

    <div class="user_summary" id="student">

        <!-- Picture -->
        <img src="{{ URL::asset('img/user.jpg') }}" alt="Profile Picture" class="picture">

        <div class="user_info">

            <div class="main_info">
                <!-- <div class="user_name">Eilidh Clark</div>
                <div class="user_type">Student Ambassador</div>
                <div class="user_study">BSc Computer Science | Year 2</div> -->
                <div class="user_name">{{ $user->name }}</div>
                @if (!empty($profile))
                <div class="user_type">Student Ambassador</div>
                
                    <div class="user_study">{{ $profile->course }} | Year {{ $profile->study_year }}</div>
                
                @endif
            </div>

            <div class="contact_info">
                <!-- <div class="user_phone">+44 8503 593 833</div> -->
                <!-- <div class="user_email"><span>1712970</span>@rgu.ac.uk</div>
                <div class="user_gender">Female</div> -->

                <div class="user_phone">+44 8503 593 833</div>
                <div class="user_email">{{ $user->email }}</div>
                <div class="user_gender">Female</div>
            </div>

        </div>
        
    </div>


    @if (!empty($profile))
    <div class="student_info">

        <!-- Student Skills -->
        <div class="student_skills">
            <div class="user_area_title">Skills</div>
            <!-- <div class="skills_list">
                <div class="skills_item">Web Development</div>
                <div class="skills_item">Programming</div>
                <div class="skills_item">Event Management</div>
                <div class="skills_item">Interpersonal Skills</div>
            </div> -->
            <div class="skills_list">
                @foreach ($skills as $skill)
                <div class="skills_item">{{ $skill->skill }}</div>
                @endforeach
            </div>
        </div>

        <!-- Student Experience -->
        <div class="student_experience">
            <div class="user_area_title">Experience</div>
            <!-- <div class="experience_list">
                <div class="experience_item">Open Day</div>
                <div class="experience_item">Women in STEM</div>
                <div class="experience_item">Lego EV3 Robots</div>
                <div class="experience_item">Carrers Fayre</div>
            </div> -->
            <div>{{ $profile->experience }}</div>
        </div>
    </div>
    @endif

    <div class="user_events">
        <div class="user_area_title">Events</div>
        <table class="events_table">
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Completion</th>
                <th>Priority</th>
            </tr>
            <!-- <tr>
                <td>Open Day</td>
                <td>20th October 2019</td>
                <td>75%</td>
                <td>Yes</td>
            </tr>
            <tr>
                <td>Lego EV3 Robots</td>
                <td>20th October 2019</td>
                <td>25%</td>
                <td>Yes</td>
            </tr>
            <tr>
                <td>Anne Elk's Talk</td>
                <td>12th November 2019</td>
                <td>50%</td>
                <td>Yes</td>
            </tr> -->
            @foreach ($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->date }}</td>
                <td>75%</td>
                <td>{{ $event->priority }}</td>
            </tr>
            @endforeach
        </table>

    </div>
<!-- 
    <p>Admin Page</p>
    <p>{{ $user }}</p>

    <p>My Events</p>
    <ul>
        @foreach ($events as $event)
        <li>{{ $event->title }} : {{ $event->description }}</li>
        @endforeach
    </ul>

    <p>My Tasks</p>
    <ul>
        @foreach ($tasks as $task)
        <li>{{ $task->title }}</li>
        @endforeach
    </ul>

    @if (!empty($profile))
    <p>My Profile</p>
    <ul>
        <li>{{ $profile }}</li>
    </ul>

    <p>My Skills</p>
    <ul>
        @foreach ($skills as $skill)
        <li>{{ $skill }}</li>
        @endforeach
    </ul>
    @endif
-->
</div>

<!-- Events Area -->
<div class="side">

    <div class="side_title">Tasks</div>

    <!-- Event List -->
    <div class="tasks_list">

        <!-- <p id="no-tasks">No Tasks</p> -->

        <!-- <div class="box single_task to_do_task">
            <div class="task_title">Prepare Room</div>

            !-- View the event containing the task --
            <form method="POST" action="{{ url('/event') }}">
            @csrf
            <input name="event_id" type="hidden">
            <button class="button view_button">View</button>
            </form>
        </div> -->

        @foreach ($tasks as $task)
        <div class="box single_task in_progress_task">
            <div class="task_title">{{ $task->title }}</div>

            <!-- View the event containing the task -->
            <form method="POST" action="">
            @csrf
            <input name="event_id" type="hidden">
            <button class="button view_button">View</button>
            </form>
        </div>
        @endforeach

    </div>

</div>

@endsection