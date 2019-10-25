<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/eventmanager', function () {
    return view('eventmanager');
});

Route::get('/admin', 'UserController@user');

Route::get('/event', function() {
    return view('event');
});

Route::get('/task', 'TaskController@tasks');
Route::get('/comment', 'CommentController@comments');

Route::get('/calendar', 'EventController@calendar');

// TEST ROUTE
Route::get('/test', 'TestController@showdata');

// POST ROUTES
Route::post('/getdates', 'EventController@getdates');
Route::post('/geteventinfo', 'EventController@geteventinfo');
