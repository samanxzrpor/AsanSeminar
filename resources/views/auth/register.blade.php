@extends('layouts.main')

@section('content')
    <div class="form-content">
        @include('errors.error')
        <h1>Create New Account</h1>
        <form class="auth" action="{{route('register')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">User Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your User Name" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone" placeholder="Enter your User Phone" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your Password" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation"
                       placeholder="Enter your Confirm Password" required>
            </div>
            <button type="submit" class="btn btn-success">Register</button>
        </form>
        <h6 class="change-auth-link">if You have account ago <a href="{{route('showLoginForm')}}">Login</a></h6>
    </div>
@endsection
