@extends('layouts.main')

@section('content')
    <div class="form-content">
        <h1>Login</h1>
        @include('errors.error')
        <form class="auth" action="{{route('login')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" value="{{old('email')}}" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                <input type="password" class="form-control" value="{{old('password')}}" name="password"
                       placeholder="Enter your Password" required>
            </div>
            <button type="submit" class="btn btn-success">Login</button>
        </form>
        <p class="change-auth-link">if You have not account ago <a href="{{route('showRegisterForm')}}">Create
                Account</a></p>
    </div>
@endsection
