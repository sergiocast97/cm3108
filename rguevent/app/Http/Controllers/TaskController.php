<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use App\Task;

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
            'task_id' => 'required|exists:tasks,id'
        ]);

        // find task by id
        $task = Task::find($request->task_id);

        // delete task from table
        $task->delete();

        return redirect()->back();

    }

    // assign user
    public function assign_task() {
        //
    }

    public function update_status() {
        //
    }

}
