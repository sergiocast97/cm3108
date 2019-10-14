<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function user() {
        $user = User::find(1);
        return view('admin', ['user' => $user]);
    }
}
