@extends('layouts.admin.main')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <h1>Post a job</h1>
                <form action="" method="POST">@csrf
                    <div class="form-group">
                        <label for="file">Feature Image</label>
                        <input type="file" name="feature_image" id="feature_image" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" placeholder=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Roles and Responsibilty</label>
                        <textarea id="description" name="roles" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Job Types</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="job_type" id="part_time"  value="Part time">
                            <label for="part_time" class="form-check-label">Full Time</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="part_time" id="part_time"  value="Part time">
                            <label for="part_time" class="form-check-label">Part Time</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="casual" id="casual"  value="casual">
                            <label for="casual" class="form-check-label">Casual</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="contract" id="contract"  value="contract">
                            <label for="contract" class="form-check-label">Contract</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="date">Application closing date</label>
                        <input type="date" name="date" id="date" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success">Post a Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
