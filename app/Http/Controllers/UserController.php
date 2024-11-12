<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    const JOB_SEEKER = 'seeker';
    const JOB_POSTER = 'poster';
    public function createSeeker()
    {
        return view('users.seeker-register');
    }

    public function storeSeeker(RegistrationFormRequest $request)
    {
        User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => Hash::make(request('password')),
        'user_type' => self::JOB_SEEKER,
        ]);

        return redirect()->route('login')->with('successMessage', 'Your account was created');
    }

    public function loginSeeker()
    {
        return view('users.login');
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

    public function storeEmployer(RegistrationFormRequest $request)
    {
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => self::JOB_POSTER
        ]);

        return redirect()->route('login')->with('successMesssage', 'Your account was created');
    }
}
