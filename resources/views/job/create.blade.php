@extends('layouts.admin.main')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <h1>Post a job</h1>
                <form action="{{route('job.store')}}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="file">Feature Image</label>
                        <input type="file" name="feature_image" id="feature_image" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="">
                        @if ($errors->has('title'))
                            <div class="error"> {{$errors->first('title')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="summernote form-control"></textarea>
                        @if ($errors->has('description'))
                            <div class="error">{{$errors->first('description')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Roles and Responsibilty</label>
                        <textarea id="description" name="roles" class="summernote from-control"></textarea>
                        @if ($errors->has('roles'))
                            <div class="error">{{$errors->first('roles')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Job Types</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="job_type" id="full_time"  value="Fulltime">
                            <label for="full_time" class="form-check-label">Full Time</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="job_type" id="part_time"  value="Parttime">
                            <label for="part_time" class="form-check-label">Part Time</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="job_type" id="casual"  value="Casual">
                            <label for="casual" class="form-check-label">Casual</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="job_type" id="contract"  value="Contract">
                            <label for="contract" class="form-check-label">Contract</label>
                        </div>
                        @if ($errors->has('job_type'))
                            <div class="error">{{$errors->first('job_type')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" name="salary" id="salary" class="form-control">
                        @if ($errors->has('salary'))
                            <div class="error">{{$errors->first('salary')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control">
                        @if ($errors->has('address'))
                            <div class="error">{{$errors->first('address')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="date">Application closing date</label>
                        <input type="text" name="date" id="datepicker" class="form-control">
                        @if ($errors->has('date'))
                            <div class="error">{{$errors->first('date')}}</div>
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success">Post a Job</button>
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
