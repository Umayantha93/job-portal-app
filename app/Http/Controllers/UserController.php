<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    const JOB_SEEKER = 'seeker';
    public function createSeeker()
    {
        return view('users.seeker-register');
    }

    public function storeSeeker(JobRegisterRequest $request)
    {
        User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => Hash::make(request('password')),
        'user_type' => self::JOB_SEEKER,
        ]);

        return back();
    }

    public function loginSeeker()
    {
        return view('users.seeker-login');
    }
}
