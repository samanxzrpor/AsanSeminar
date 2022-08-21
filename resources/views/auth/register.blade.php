@extends('layouts.auth.main')

@section('auth-content')
    <div class="auth-content">
        <h1>Create New Account</h1>
        <form class="auth" action="{{route('register')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">User Name</label>
                <input type="email" class="form-control" id="email" name="name" placeholder="Enter your User Name" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone Number</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your User Phone" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Enter your Confirm Password" required>
            </div>
            <button type="submit" class="btn btn-success">Success</button>
        </form>
        <h6 class="change-auth-link">if You have account ago <a href="{{route('showLoginForm')}}">Login</a></h6>
    </div>
@endsection
