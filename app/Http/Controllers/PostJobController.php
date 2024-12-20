<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobEditFormRequest;
use App\Http\Requests\JobEditRequest;
use App\Http\Requests\JobPostFromRequest;
use App\Models\Listing;
use App\Post\JobPost;
use Illuminate\Http\Request;


class PostJobController extends Controller
{
    protected $job;
    public function __construct(JobPost $job)
    {
        $this->job = $job;
    }
    public function create()
    {
        return view('job.create');
    }

    public function store(JobPostFromRequest $request)
    {
        $this->job->store($request);
        return back();
    }

    public function edit(Listing $listing)
    {
        return view('job.edit', compact('listing'));
    }

    public function update(JobEditFormRequest $request, $id)
    {
        if($request->hasFile('feature_image')){
            $featureImage = $request->file('feature_image')->store('image', 'public');
            Listing::find($id)->update(['feature_image' => $featureImage]);
        }
        Listing::find($id)->update($request->except('feature_image'));

        return back()->with('success', 'Your job post has been successfully uploaded');

    }
}
