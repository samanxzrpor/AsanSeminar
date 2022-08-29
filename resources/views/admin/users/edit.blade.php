@extends('layouts.admin.main')

@section('admin-content')
    <div class="form-content">
        @include('errors.error')
        <h1>بروزرسانی کاربر</h1>
        <form class="auth" action="{{route('admin.users.update' , $user)}}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="" class="form-label">User Name</label>
                <input type="text" class="form-control" value="{{$user->name}}" name="name" placeholder="Enter your User Name" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone Number</label>
                <input type="text" class="form-control" value="{{$user->phone}}" name="phone" placeholder="Enter your User Phone" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email address</label>
                <input type="email" class="form-control" value="{{$user->email}}" name="email" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">User Role</label>
                <select class="form-control" name="role" id="role">
                    @foreach($roles as $role)
                        <option value="{{$role->name}}" {{$role->name == $user->roles[0]->name ? 'selected' : ''}}>{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your Password" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
