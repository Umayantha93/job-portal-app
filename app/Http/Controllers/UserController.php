<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function seekerRegister()
    {
        return view('users.seeker-register');
    }
}
