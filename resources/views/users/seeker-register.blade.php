@extends('layouts.app')


@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Looking for a job?</h1>
                <h3>Please create an account</h3>
                <img src="{{asset('image/sign-up.png')}}" width="350">
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Register</div>
                    <form action="{{route('store.seeker')}}" method="POST">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Full name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Register</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
