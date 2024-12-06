<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostJobController extends Controller
{
    public function create()
    {
        return view('job.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'feature_image' => 'required|mimes:png,jpg,jpeg',
            'description' => 'required|min:10',
            'roles' => 'required|min:10',
            'job_type' => 'required',
            'address' => 'required',
            'date' => 'required'
        ]);
    }
}
