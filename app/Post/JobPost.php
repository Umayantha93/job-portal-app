<?php

namespace App\Post;

use App\Models\Listing;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class JobPost
{
    public function store($data)
    {
        $imagePath = $data->file('feature_image')->store('images', 'public');
        Listing::create([
            'feature_image' => $imagePath,
            'user_id' => auth()->user()->id,
            'title' => $data['title'],
            'description' => $data['description'],
            'roles' => $data['roles'],
            'job_type' => $data['job_type'],
            'address' => $data['address'],
            'application_close_date' => Carbon::createFromFormat('d/m/Y', $data['date'])->format('Y-m-d'),
            'salary' => $data['salary'],
            'slug' => Str::slug($data['title']) . '.' . Str::uuid(),
        ]);
    }

    public function updatePost($id, $data)
    {
        if($data->hasFile('feature_image')){
            $featureImage = $data->file('feature_image')->store('image', 'public');
            Listing::find($id)->update(['feature_image' => $featureImage]);
        }

        Listing::find($id)->update($data->except('feature_image'));
    }
}
