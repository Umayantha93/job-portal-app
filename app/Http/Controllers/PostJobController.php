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
        // $this->job->store($request);
        (new JobPost)->store($request);
        return back();
    }

    public function edit(Listing $listing)
    {
        return view('job.edit', compact('listing'));
    }

    public function update(JobEditFormRequest $request, $id)
    {

        // $this->job->updatePost($id, $request);

        (new JobPost())->updatePost($id, $request);

        return back()->with('success', 'Your job post has been successfully uploaded');

    }
}
