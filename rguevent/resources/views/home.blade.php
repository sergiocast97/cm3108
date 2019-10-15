@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            <div class="links">
                <a href="{{ url('/home') }}">Home</a>
                <a href="{{ url('/admin') }}">Admin</a>
                <a href="{{ url('/event') }}">Event</a>
                <a href="{{ url('/task') }}">Task</a>
                <a href="{{ url('/comment') }}">Comment</a>
                <a href="{{ url('/calendar') }}">Calendar</a>
            </div>
        </div>
    </div>
</div>
@endsection
