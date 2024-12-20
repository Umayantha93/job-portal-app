@extends('layouts.admin.main')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <h1>Update a job</h1>
                @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                <form action="{{route('job.update', [$listing->id])}}" method="POST" enctype="multipart/form-data">@csrf
                    @method('PUT ')
                    <div class="form-group">
                        <label for="file">Feature Image</label>
                        <input type="file" name="feature_image" id="feature_image" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{$listing->title}}" class="form-control" placeholder="">
                        @if ($errors->has('title'))
                            <div class="error"> {{$errors->first('title')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="summernote form-control">{{$listing->description}}</textarea>
                        @if ($errors->has('description'))
                            <div class="error">{{$errors->first('description')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Roles and Responsibilty</label>
                        <textarea id="description" name="roles" class="summernote from-control">{{$listing->roles}}</textarea>
                        @if ($errors->has('roles'))
                            <div class="error">{{$errors->first('roles')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Job Types</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="job_type" id="full_time"  value="Fulltime"
                            {{$listing->job_type === 'Fulltime' ? 'checked' : ''}}>
                            <label for="full_time" class="form-check-label">Full Time</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="job_type" id="part_time"  value="Parttime"
                            {{$listing->job_type === 'Parttime' ? 'checked' : ''}}>
                            <label for="part_time" class="form-check-label">Part Time</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="job_type" id="casual"  value="Casual"
                            {{$listing->job_type === 'Casual' ? 'checked' : ''}}>
                            <label for="casual" class="form-check-label">Casual</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="job_type" id="contract"  value="Contract"
                            {{$listing->job_type === 'Contract' ? 'checked' : ''}}>
                            <label for="contract" class="form-check-label">Contract</label>
                        </div>
                        @if ($errors->has('job_type'))
                            <div class="error">{{$errors->first('job_type')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" name="salary" id="salary" class="form-control" value="{{$listing->salary}}">
                        @if ($errors->has('salary'))
                            <div class="error">{{$errors->first('salary')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{$listing->address}}">
                        @if ($errors->has('address'))
                            <div class="error">{{$errors->first('address')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="date">Application closing date</label>
                        <input type="text" name="date" id="datepicker" class="form-control" value="{{$listing->application_close_date}}">
                        @if ($errors->has('date'))
                            <div class="error">{{$errors->first('date')}}</div>
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success">Update a Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        .note-insert {
            display: none!important;
        }
        .error {
            color: red;
            font-weight :bold;
        }
    </style>
@endsection
