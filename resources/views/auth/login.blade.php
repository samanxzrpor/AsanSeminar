@extends('layouts.auth.main')

@section('auth-content')
    <div class="auth-content">
        <h1>Login</h1>
        <form class="auth" action="{{route('login')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" required>
            </div>
            <button type="submit" class="btn btn-success">Success</button>
        </form>
        <p class="change-auth-link">if You have not account ago <a href="{{route('showRegisterForm')}}">Create Account</a></p>
    </div>
@endsection
