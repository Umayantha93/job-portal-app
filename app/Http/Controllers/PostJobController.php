<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PostJobController extends Controller
{
    public function create()
    {
        return view('job.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'feature_image' => 'required|mimes:png,jpg,jpeg',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'roles' => 'required|min:10',
            'job_type' => 'required',
            'salary' => 'required',
            'address' => 'required',
            'date' => 'required'
        ]);

        $imagePath = $request->file('feature_image')->store('images', 'public');
        Listing::create([
            'feature_image' => $imagePath,
            'user_id' => auth()->user()->id,
            'title' => request('title'),
            'description' => request('description'),
            'roles' => request('roles'),
            'job_type' => request('job_type'),
            'address' => request('address'),
            'application_close_date' => Carbon::createFromFormat('d/m/Y', request('date'))->format('Y-m-d'),
            'salary' => request('salary'),
            'slug' => Str::slug(request('title')).'.'.Str::uuid(),
        ]);

        return back();
    }
}
