<?php

/*
/--------------------------------------------------------------------------
/ Web Routes
/--------------------------------------------------------------------------
/
/ Here is where you can register web routes for your application. These
/ routes are loaded by the RouteServiceProvider within a group which
/ contains the "web" middleware group. Now create something great!
/
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'UserController@user');

// Route::get('/event', function() {
//     return view('event');
// });

Route::get('/task', 'TaskController@tasks');

Route::get('/comment', 'CommentController@comments');

Route::get('/calendar', 'EventController@calendar');
Route::get('/bigtable', 'EventController@admin_events');
Route::get('/tablecopy', 'EventController@admin_events_two');

Route::post('/getdates', 'EventController@getdates');

Route::post('/geteventinfo', 'EventController@geteventinfo');

Route::post('/event','EventController@event');

// Add Task
Route::post('/addtask','TaskController@add_task');

// Update Task Status
Route::post('/updateTaskStatus','TaskController@update_status');

// Add Event
Route::post('/addevent','EventController@add_event');

// Get Task by ID
Route::post('/gettask','TaskController@get_task');

// Delete Task
Route::post('/deletetask','TaskController@delete_task');
Route::post('/addcomment','TaskController@add_comment');

Route::post('/deleteevent','EventController@delete_event');
Route::post('/editevent','EventController@edit_event');


Route::get('/task', function() {
    return view('task');
});