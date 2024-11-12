<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentails = $request->only('email', 'password');

        if(Auth::attempt($credentails)) {
            return redirect()->intended('dashboard');
        }

        return "Wrong email or password";
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function createEmployer()
    {
        return view('users.employer-register');
    }
}
