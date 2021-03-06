<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use App\Task;
use App\User;
use App\Comment;

class TaskController extends Controller
{
    // add new task to database
    public function add_task(Request $request) {

        // validate request
        $request->validate([
            'title' => 'required|max:191',
            'description' => 'max:191',
            'event_id' => 'required|exists:events,id', // event exists
            'assignee_id' => 'exists:users,id' // user exists
        ]);

        $admin = Auth::id();

        // new model for new task
        $task = new Task;

        // assign values
        $task->event_id = $request->event_id;
        $task->creator_id = $admin;
        $task->title = $request->title;
        $task->status = 'To Do';

        if (!$request->description) {
            $task->description = $request->description;
        }
        
        if (!$request->assignee) {
            $task->assignee_id = $request->assignee;
        }

        // save task
        $task->save();

        // return redirect()->back();
        // return "Success";
        return [$task,$admin];
    }

    // edit task in database
    public function edit_task(Request $request) {
        // validate
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'title' => 'required|max:191',
            'description' => 'max:191'
        ]);

        $task = Task::find($request->task_id);

        if ($task->title != $request->title) {
            $task->title = $request->title;
        }

        if ($task->description != $request->description) {
            $task->description = $request->description;
        }       

        $task->save();

        return redirect()->back();

    }

    // delete task from database
    public function delete_task(Request $request) {
        // valiate task id exists
        $request->validate([
            'id' => 'required|exists:tasks,id'
        ]);

        // find task by id
        $task = Task::find($request->id);

        // delete task from table
        $task->delete();

        return 'True';

    }

    // assign user
    public function assign_task() {
        //
    }

    // Update Status on Drag & Drop
    public function update_status(Request $request) {
        
        // valiate task status exists
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'task_status' => 'required'
        ]);

        $task = Task::find($request->task_id);

        if ($task->status != $request->task_status) {
            $task->status = $request->task_status;
        }       

        $task->save();

        return 'True';
    }

    public function get_task(Request $request) {
        // dd($request);

        $task = Task::find($request->id);

        $comments = $task->comments()->get();

        foreach ($comments as $comment) {
            $author = User::find($comment->author_id);
            $comment->authorname = $author->name;
        }

        // dd($comments);

        // dd($comments);

        return [$task,$comments];
    }

    public function add_comment(Request $request) {
        
        $comment = new Comment;

        $comment->author_id = Auth::id();

        $comment->task_id = $request->taskid;
        $comment->message = $request->message;

        $comment->save();

        $author = Auth::user();
        $comment->authorname = $author->name;

        return $comment;

    }


}
